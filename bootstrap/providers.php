<?php

return [
    App\Providers\AppServiceProvider::class,
    \Picfodase\Transaction\TransactionRouteProvider::class,
    \Picfodase\PaymentGateways\PaymentGatewayServiceProvider::class,
    \Picfodase\Notifications\NotificationServiceProvider::class
];
