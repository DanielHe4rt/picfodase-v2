<?php

namespace Picfodase\PaymentGateways\Providers;

use Exception;

class PaymentGatewayException extends Exception
{
    public static function notImplemented(): self
    {
        return new self('Provider not implemented');
    }
}
