<?php

namespace App\Services\Adapters;

use Illuminate\Support\Facades\Http;


class TokenAdapter
{

    public function getToken()
    {

        //pasamos el client y secret y seteamos el parametro grant_type para obtener el token
        $response_token = Http::withBasicAuth(env('CLIENT_ID'), env('CLIENT_SECRET'))
            ->asForm()->post(env('URL_TOKEN_SPOTIFY'),
                [
                    'grant_type' => 'client_credentials'
                ]);

        return json_decode($response_token);
    }


}
