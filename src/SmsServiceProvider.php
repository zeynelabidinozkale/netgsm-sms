<?php

namespace Zeynelabidinozkale\NetgsmSms;
use Zeynelabidinozkale\NetgsmSms\SmsManagement;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/sms.php' => config_path('sms/sms.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sms', function ($app) {
            return new SmsManagement;
        });

        $this->app->alias('sms', 'Zeynelabidinozkale\NetgsmSms\SmsManagement');
    }

}
