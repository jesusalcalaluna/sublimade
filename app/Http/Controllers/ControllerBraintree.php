<?php

namespace App\Http\Controllers;




use Braintree\Gateway;
use Illuminate\Http\Request;


class ControllerBraintree extends Controller
{
    function client_token(){




        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'mxxfwff3fs9st5dr',
            'publicKey' => 'hmfpqy87s8nz6brx',
            'privateKey' => '0a0d8d52eed6522ef43333257869b30d'
        ]);
        $clientToken = $gateway->clientToken()->generate();

        return $clientToken;

    }

    function checkout(Request $r){
        $nonceFromTheClient = $r->get('payment_method_nonce');
        $monto = $r->get('monto');
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'mxxfwff3fs9st5dr',
            'publicKey' => 'hmfpqy87s8nz6brx',
            'privateKey' => '0a0d8d52eed6522ef43333257869b30d'
        ]);
        $result = $gateway->transaction()->sale([
            'amount' => $monto,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return $result;


    }
}
