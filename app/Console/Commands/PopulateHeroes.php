<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Services\GetTokenService;

class PopulateHeroes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marvel:heroes';

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
        $token = new GetTokenService();
        $token = $token->getToken();
        dd($token);
        $response = Http::get('http://example.com');

        dd($response);
        return Command::SUCCESS;
    }
}
