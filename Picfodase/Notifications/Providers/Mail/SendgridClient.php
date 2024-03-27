<?php

namespace Picfodase\Notifications\Providers\Mail;

use Illuminate\Support\Facades\Http;
use Picfodase\Notifications\NotificationContract;

class SendgridClient implements NotificationContract
{
    public function sendPaymentApproval(): bool
    {
        $request = Http::get('https://run.mocky.io/v3/54dc2cf1-3add-45b5-b5a9-6bf7e7f1f4a6')
            ->json();

        return $request['message'] === true;
    }

    public function getProviderName(): string
    {
        return 'sendgrid';
    }
}
