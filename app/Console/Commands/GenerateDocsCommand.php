<?php

namespace App\Console\Commands;

use App\Http\Services\DocService;
use App\Models\PatientCard;
use App\Models\Registers\MedicalCenter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class GenerateDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $centers = MedicalCenter::get();

        foreach ($centers as $center) {
            $cards = PatientCard::select('id')->where('updated_at', '>=', now()->subHours(12))->where('medical_center', $center->id)->get()->toArray();
            if(!$cards) {
                continue;
            }

            $ids = [];

            foreach ($cards as $id) {
                $ids[] = $id;
            }

            $zip = app(DocService::class)->generate($ids);

            Mail::send('mail.generated', [], function ($message) use ($center, $zip) {
                $emailList = explode(',', $center->email);
                $message->from(\env('MAIL_USERNAME'));
                $message->sender(\env('MAIL_USERNAME'));
                $message->subject('Писмецо');

                $message->to($emailList[0]);
                $message->attach($zip);
            });
        }
    }
}
