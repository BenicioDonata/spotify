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
            if(!isset($albums->albums->items))
                return false;

            foreach($albums->albums->items as $album) {

                $album_array[$i]['name'] =  $album->name;
                $album_array[$i]['release_date'] =  $album->release_date;
                $album_array[$i]['total_tracks'] =  $album->total_tracks;
                $album_array[$i]['cover']['height'] =  $album->images[0]->height;
                $album_array[$i]['cover']['width'] =  $album->images[0]->width;
                $album_array[$i]['cover']['url'] =  $album->images[0]->url;


            $i++;
            }

            return $album_array;


        } catch (\Exception $e) {

            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }

    }



}
