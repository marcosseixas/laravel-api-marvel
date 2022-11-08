<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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

    protected $link = 'https://gateway.marvel.com:443';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle($infos = [])
    {
        $ts = time();
        $privateKey = env('PRIVATE_KEY');
        $apikey = env('PUBLIC_KEY');
        $hash = md5($ts . $privateKey . $apikey);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->link . '/v1/public/characters?ts=' . $ts . '&apikey=' . $apikey . '&hash=' . $hash . '&limit=2', []);

        $status = $response->getStatusCode();
        $results = json_decode($response->getBody());
        if($status == 200)
        {
            foreach($results->data->results as $hero) {

                $img = $hero->thumbnail->path . '.' . $hero->thumbnail->extension;
                $infos[] = [
                    'hero_id' => $hero->id,
                    'name' => $hero->name,
                    'img' => $img
                ];
        
            }
           
            dd($infos);
        }

        dd('end');


        return Command::SUCCESS;
    }
}
