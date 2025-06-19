<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MarvelService
{
    protected $publicKey;
    protected $privateKey;

    public function __construct()
    {
        $this->publicKey = config('services.marvel.public');
        $this->privateKey = config('services.marvel.private');
    }

    public function getComics($query = '')
    {
        $ts = time();
        $hash = md5($ts . $this->privateKey . $this->publicKey);

        $response = Http::withoutVerifying()->get('https://gateway.marvel.com/v1/public/comics', [
            'apikey' => $this->publicKey,
            'ts' => $ts,
            'hash' => $hash,
            'titleStartsWith' => $query,
            'limit' => 20,
        ]);

        return $response->json();
    }
}
