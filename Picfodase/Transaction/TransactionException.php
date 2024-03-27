<?php

namespace Picfodase\Transaction;

use Exception;
use Picfodase\Notifications\NotificationContract;
use Picfodase\PaymentGateways\PaymentGatewayContract;

class TransactionException extends Exception
{
    public static function retailerNotAllowedToPay(): self
    {
        return new self("Retailers isn't allowed to pay anyone.");
    }

    public static function outOfPocket(): self
    {
        return new self("No money on wallet :/ (you're out of pocket my dude)");
    }

    public static function notAuthorizedByGateway(PaymentGatewayContract $gateway): self
    {
        return new self(sprintf('Payment not authorized by %s. Rollbacking...', $gateway->getGatewayName()));
    }

    public static function paymentMessageNotSent(NotificationContract $notification): self
    {
        return new self(sprintf('Message not sent by %s. Rollbacking...', $notification->getProviderName()));
    }
}
