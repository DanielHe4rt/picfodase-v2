<?php

namespace Picfodase\PaymentGateways;

use Illuminate\Support\ServiceProvider;
use Picfodase\PaymentGateways\Providers\PaymentGatewayException;
use Picfodase\PaymentGateways\Providers\Picpay\PicpayGatewayClient;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(PaymentGatewayContract::class, function ($app) {
            return match ($app['config']['payments.default_provider']) {
                'picpay' => new PicpayGatewayClient(),
                default => throw PaymentGatewayException::notImplemented(),
            };
        });
    }
}
