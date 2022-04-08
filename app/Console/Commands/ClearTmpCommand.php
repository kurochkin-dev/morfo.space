<?php

namespace App\Console\Commands;

use DirectoryIterator;
use Illuminate\Console\Command;

class ClearTmpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:tmp';

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
        $this->clear(storage_path() . '/tmp/');
        $this->clear(public_path() . '/tmp/');
    }

    protected function clear($path) {
        foreach (new DirectoryIterator($path) as $fileInfo) {
            if(!$fileInfo->isDot() && $fileInfo->isDir()) {
                if((count(scandir($fileInfo->getPathname()))) > 2) {
                    $this->clear($fileInfo->getPathname());
                }
                rmdir($fileInfo->getPathname());
                continue;
            }

            if(!$fileInfo->isDot()) {
                unlink($fileInfo->getPathname());
            }
        }
    }
}
