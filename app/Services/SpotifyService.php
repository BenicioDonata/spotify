<?php

namespace App\Services;

use App\Models\Card;
use App\Models\OmbuRequest;
use App\Services\Adapters\CardAdapter;
use Illuminate\Support\Facades\DB;
use Exception;
use App\ApiCode;


class CardService
{

    private $cardAdapter;
    public function __construct(CardAdapter $cardAdapter)
    {
        $this->cardAdapter = $cardAdapter;
    }


    public function proccessDataPaymenCard($data_card,$request_id) {

        try {

            // Valido los campos requeridos del request
            $result_request = validate_request($data_card);

            if(isset($result_request["error"]))
                return $result_request["error"];


            //verificamos si la card ya existe en la DB
            $data_card_verify = $this->verifyPaymentCard($data_card->card_pan);

            //si la card existe, verifico si el tiempo limite de revalidacion expiro
            if($data_card_verify)
               $need_revalidation = set_time_limit_for_revalidation($data_card_verify->validate_date);


            //si card number no existe en la DB o necestia una revalidacion por tiempo expirado
            if(!$data_card_verify || $need_revalidation ) {

                //comienzo el proceso de validar con la api ext.
                $result_validate_card = $this->validatePaymentCardInPayland($data_card,$request_id);

                if(isset($result_validate_card["error"]))
                    return $result_validate_card;

                // como lo validó sin errores la api externa lo guardo en la DB
                $data_save = $this->savePaymenCardValidated($result_validate_card,$data_card->card_pan,$request_id);

                return $data_save;

            } else {


                //si estamos aca es porque la card ya fue validad por la api ext. y esta en nuestra DB
                return $data_card_verify;
           }

        } catch (\Exception $e) {

            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }

    }

    public function validatePaymentCardInPayland($data_card,$request_id) {


        // consulto a la api externa la data de la nueva card
        $response_api_external = $this->cardAdapter->getResponseApiExternal($data_card,$request_id);
        $data_result = json_decode($response_api_external);


        // si esta el campo is_saved no esta seteado y sí el campo details es porque fallo la validacion de la api ext.
        // viene un mensaje de error que es el que voy a mostrar en la respuesta
        if(!isset($data_result->is_saved) && isset($data_result->details))
           return [ "code" => ApiCode::OPERATION_NOT_ALLOWED, "error" => $data_result->details];


        return $response_api_external;

    }

    private function savePaymenCardValidated($payment_card,$card_number,$request_id) {

        try {

            DB::beginTransaction();

            $data_payment_card = json_decode($payment_card);

            $card = new Card();
            $card->OmbuRequest()->associate(OmbuRequest::find($request_id));
            $card->uuid = $data_payment_card->Source->uuid;
            $card->type = $data_payment_card->Source->type;
            $card->token = $data_payment_card->Source->token;
            $card->brand = $data_payment_card->Source->brand;
            $card->country = $data_payment_card->Source->country;
            $card->holder = $data_payment_card->Source->holder;
            $card->bin = strval($data_payment_card->Source->bin);
            $card->card_pan = $card_number;
            $card->last_four = $data_payment_card->Source->last4;
            $card->expire_month = $data_payment_card->Source->expire_month;
            $card->expire_year = $data_payment_card->Source->expire_year;
            $card->additional = $data_payment_card->Source->additional;
            $card->bank = $data_payment_card->Source->bank;
            $card->validate_date = $data_payment_card->Source->validation_date;
            $card->prepaid = $data_payment_card->Source->prepaid;
            $card->is_saved = $data_payment_card->Source->is_saved;


            $card->save();

            DB::commit();

            return $card;

        } catch (\Exception $e) {

            DB::rollback();
            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));

        }

    }

    private function verifyPaymentCard($card_number)
    {

        //compruebo si el card_number existe en la tabla paynopain_cards
        $card = Card::card($card_number);

        //si card number no existe automaticamente voy a validarlo con la api externa
        if(!$card)
            return false;

        //si existe retorno el objeto de card
        return $card;

    }


}
