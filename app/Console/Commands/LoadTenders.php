<?php

namespace App\Console\Commands;

use App\Services\TenderService;
use Illuminate\Console\Command;

class LoadTenders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenders:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tenders Load';

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
    public function handle(TenderService $tenderService)
    {
        $this->info('Start load CSV');
        $tenderService->LoadTenders();
        $this->info('End load CSV');

    }
}
