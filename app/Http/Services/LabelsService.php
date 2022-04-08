<?php

namespace App\Http\Services;

use App\Models\PatientCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LabelsService
{
    public function createLabels(array $labels)
    {
        $card = PatientCard::find($labels['id']);

        $dest = imagecreatefrompng(public_path() . '/images/sample.png');
        $images = [];

        foreach ($labels['colors'] as $color) {
            if($color['count']) {
                $filename = time();
                copy('https://barcode.tec-it.com/barcode.ashx?data=' . $card->incoming_number . '&code=DataMatrix&translate-esc=on',
                    public_path() . '/tmp/' . $filename . '.gif');
                $src = imagecreatefromgif(public_path() . '/tmp/' . $filename . '.gif');
                imagealphablending($dest, false);
                imagesavealpha($dest, true);

                imagecopymerge($dest, $src, 10, 10, 0, 0, 56, 56, 100);
                $black = imagecolorallocate($dest, 0, 0, 0);
                $font = public_path() . '/fonts/arial.ttf';
                imagettftext($dest, 12, 0, 10, 100, $black, $font, $card->surname);
                imagettftext($dest, 12, 0, 10, 120, $black, $font, $card->name . ' ' . $card->patronymic);
                imagettftext($dest, 12, 0, 10, 150, $black, $font, $color['color']);

                imagettftext($dest, 12, 0, 75, 23, $black, $font, date('d.m.Y'));
                imagettftext($dest, 14, 0, 75, 55, $black, $font, '№ ' . $card->incoming_number);

                imagettftext($dest, 10, 270, 185, 10, $black, $font, 'Morfolab');

                imagepng($dest, public_path() . '/tmp/' . $filename . '_label.png');

                $images[] = ['/tmp/' . $filename . '_label.png', $color['count']];
            }
        }

        $statuses = json_decode(Auth::user()->group()->statuses);

        if(in_array('cutting', $statuses)) {
            $card->status = 'cutting_completed';
            $card->save();
        }

        return $images;
    }
}
