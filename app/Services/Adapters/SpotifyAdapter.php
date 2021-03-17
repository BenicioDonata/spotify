<?php
namespace App\Services\Adapters;

use Illuminate\Support\Facades\Http;


class SpotifyAdapter
{

    public function getAlbumsByBandName($band_name,$token)
    {

        //consumo el servicio para traerme el listado de albums
        $response = Http::withHeaders
        (['Content-Type' => 'application/json',
            'Authorization' => 'Bearer '. $token])
            ->get(env('URL_SPOTIFY_ALBUMS_BY_BAND_NAME')."/".$band_name."/albums");


        return json_decode($response);
    }


}



