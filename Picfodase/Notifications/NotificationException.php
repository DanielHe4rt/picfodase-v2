<?php

namespace Picfodase\Notifications;

use Exception;

class NotificationException extends Exception
{
    public static function providerNotImplemented(): self
    {
        return new self('Provider not implemented.');
    }
}
