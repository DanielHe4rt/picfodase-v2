<?php

namespace Picfodase\PaymentGateways\Providers\Picpay;

use Illuminate\Support\Facades\Http;
use Picfodase\PaymentGateways\PaymentGatewayContract;

class PicpayGatewayClient implements PaymentGatewayContract
{


    public function getGatewayName(): string
    {
        return 'picpay';
    }

    public function authorizePayment(): bool
    {
        $request = Http::get('https://run.mocky.io/v3/5794d450-d2e2-4412-8131-73d0293ac1cc')->json();

        return $request['message'] == 'Autorizado';
    }
}
