<?php
namespace App\Helper;


class ResponseBuilder
{

    public static function result($status, $code, $data) {

        return [
            "success"      => $status,
            "http_code"    => $code,
            "detail"       => $data
        ];

    }
}
