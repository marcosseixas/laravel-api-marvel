<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GetTokenService
{

    protected $publicKey = 'a02e3347e7c15763bd96af1f46e1adee';
    protected $privateKey = '48c474302a5572e72e9c860e171f5e460b9274db';
    protected $link = 'developer.marvel.com';

    public function getToken()
    {
        dd('oi');
    }
}