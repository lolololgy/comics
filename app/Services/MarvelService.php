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

    public function
    getComics($query = '', $offset = 0)
    {
        $ts = time();
        $hash = md5($ts . $this->privateKey . $this->publicKey);

        $params = [
            'apikey' => $this->publicKey,
            'ts' => $ts,
            'hash' => $hash,
            'limit' => 20,
            'offset' => $offset,
        ];

        if (!empty($query)) {
            $params['titleStartsWith'] = $query;
        }

        $response = Http::withoutVerifying()->get('https://gateway.marvel.com/v1/public/comics', $params);

        return $response->json();
    }
}
