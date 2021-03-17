<?php

namespace App\Services;

use App\Services\Adapters\SpotifyAdapter;
use Exception;


class SpotifyService
{

    private $spotifyAdapter;

    public function __construct(SpotifyAdapter $spotifyAdapter)
    {
        $this->spotifyAdapter = $spotifyAdapter;
    }


    public function processRequest($band_name,$token) {

        try {

            $album_array = array();
            $i=0;
            //obtenemos el listado de albumes
            $albums = $this->spotifyAdapter->getAlbumsByBandName($band_name,$token);

            //Si por algun motivo fallo el servidor de spotify en devolverme el listado retorno false
            if(!isset($albums->items))
                return false;

            foreach($albums->items as $album) {

                $album_array[$i]['name'] =  $album->name;
                $album_array[$i]['release_date'] =  $album->release_date;
                $album_array[$i]['total_tracks'] =  $album->total_tracks;

                //al probar con este id 1vCWHaC5f2uS3yhpwWbIA6 no traia cover por eso la validacion a continuacion
                if(isset($album->cover))
                    $album_array[$i]['cover'] =  $album->cover;

            $i++;
            }

            return $album_array;


        } catch (\Exception $e) {

            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }

    }



}
