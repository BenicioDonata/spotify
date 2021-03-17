<?php

namespace App\Services;

use App\Services\Adapters\TokenAdapter;
use Exception;

class TokenService
{

    private $tokenAdapter;

    public function __construct(TokenAdapter $tokenAdapter)
    {
        $this->tokenAdapter = $tokenAdapter;
    }


    public function getTokenByClient() {

        try {

            $token = $this->tokenAdapter->getToken();

            return $token;

        } catch (\Exception $e) {

            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }

    }


}
