<?php

namespace Picfodase\PaymentGateways;

interface PaymentGatewayContract
{

    public function getGatewayName(): string;
    public function authorizePayment(): bool;
}
