<?php

namespace App\Console\Commands;

use App\Models\Registers\MkbRegister;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MkbLoader extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mkb:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load mkb csv from https://mkb10.su';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $link = 'https://mkb10.su/download/mkb10.xlsx';

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
        $file = file_get_contents($this->link);
        file_put_contents('storage/registers/mkb10.xlsx', $file);
        (new FastExcel)->startRow(5)->import('storage/registers/mkb10.xlsx', function ($line) {
            $data = array_values($line);
            return MkbRegister::create([
                'name' => $data[1],
                'code' => $data[0]
            ]);
        });
    }
}
