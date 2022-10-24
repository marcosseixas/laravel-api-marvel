<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PopulateHeroe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marvel:get_heroes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chama a api da marvel e popula o banco de dados com os herois';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dd('hello friend.');
        return Command::SUCCESS;
    }
}
