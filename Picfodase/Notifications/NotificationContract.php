<?php

namespace Picfodase\Notifications;

interface NotificationContract
{
    public function getProviderName();
    public function sendPaymentApproval(): bool;
}
