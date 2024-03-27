<?php

namespace Picfodase\Notifications;

use Illuminate\Support\ServiceProvider;
use Picfodase\Notifications\Providers\Mail\SendgridClient;

class NotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(NotificationContract::class, function ($app) {
            return match ($app['config']['payments.default_notification']) {
                'sendgrid' => new SendgridClient(),
                default => NotificationException::providerNotImplemented(),
            };
        });
    }
}
