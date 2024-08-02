<?php

use App\Mail\ThankYou;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('test:mail', function() {
    $user = User::first();
    Mail::to($user->email)
        ->send(new WelcomeMail($user));

    Mail::to($user->email)
        ->send(new ThankYou);

    $this->components->info('Welcome & Thank you email sent.');
});

Artisan::command('test:notify', function() {
    $user = User::first();

    $user->notify(new WelcomeNotification);

    $this->components->info('Welcome notifications sent.');
});