<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SpotifyService;
use App\Services\TokenService;
use App\Helper\ResponseBuilder;
use App\Codes\ApiCode;
use Exception;

class SpotifyController extends Controller
{
    private $spotifyService;
    private $tokenService;


    public function __construct(SpotifyService $spotifyService, TokenService $tokenService)
    {
        $this->spotifyService = $spotifyService;
        $this->tokenService = $tokenService;

    }


    public function getAlbumsbyBandName(Request $request)
    {
        try {

            // validamos que el request sea un array
            if (!$request->all())
                return ResponseBuilder::result(false,ApiCode::BAD_REQUEST,ApiCode::BAD_REQUEST_STRING);


            //Obtenemos el token
            $token =$this->tokenService->getTokenByClient();

            //si por algun motivo falla la devolucion del token del lado del servido de spotify devolvemos un error
            if(!isset($token->access_token))
                return ResponseBuilder::result(false,ApiCode::FAIL_RESPONSE,ApiCode::FAIL_RESPONSE_STRING);


            //Utilizamos el metodo del service para procesar el request con el token obtenido,
            $response = $this->spotifyService->processRequest($request->band_name,$token->access_token);


            //si por algun motivo falla la devolucion del token del lado del servido de spotify devolvemos un error
            if(!$response)
                return ResponseBuilder::result(false,ApiCode::FAIL_RESPONSE,ApiCode::FAIL_RESPONSE_STRING);


            //retornamos el listado de albumes
            echo json_encode($response,JSON_PRETTY_PRINT);


        }catch (\Exception $e) {

            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }

    }

}
