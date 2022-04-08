<?php

namespace App\Http\Services;

use App\Models\PatientCard;
use App\Models\Registers\Color;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use ZipArchive;

class DocService
{
    public function generate(array $ids, string $format = 'doc')
    {
        $zipFile = storage_path() . '/tmp/'. time() . '.zip';
        $zip = new ZipArchive();
        $zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $colors = Color::get();
        $colorForRender = [];
        $dirName = storage_path() . '/tmp/'. time();
        mkdir($dirName, 0777);

        foreach ($colors as $color) {
            $colorForRender[$color->id] = $color;
        }

        foreach ($ids as $id) {
            $card = PatientCard::where('id', $id)->first();

            if($format === 'doc') {
                $fileName = $card->surname . ' ' . $card->name . ' ' . $card->patronymic . '.docx';
                file_put_contents($dirName . '/' . $fileName, view('doc_templates.conclusion', ['card' => $card, 'colors' => $colorForRender])->render());
            } else {
                $fileName = $card->surname . ' ' . $card->name . ' ' . $card->patronymic . '.pdf';
                $mpdf = new Mpdf();
                $mpdf->WriteHTML(view('doc_templates.conclusion', ['card' => $card, 'colors' => $colorForRender])->render());
                $mpdf->Output($dirName . '/' . $fileName, Destination::FILE);
            }
        }

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dirName));

        foreach ($files as $name => $file)
        {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($dirName) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();

        return $zipFile;
    }

    public function generatePreview($ids) {
        $colors = Color::get();
        $colorForRender = [];
        $html = '';

        foreach ($colors as $color) {
            $colorForRender[$color->id] = $color;
        }

        foreach ($ids as $id) {
            $card = PatientCard::where('id', $id)->first();
            $html .= view('doc_templates.conclusion', ['card' => $card, 'colors' => $colorForRender])->render();
        }

        return $html;
    }
}
