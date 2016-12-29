<?php


namespace Pdewit\TelegramLogger;


use Illuminate\Support\ServiceProvider;

class TelegramLoggerServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/telegram.php', 'telegram'
        );

        $this->app->singleton(TelegramLogger::class, function ($app) {
            return new TelegramLogger(config('telegram.token'), config('telegram.chat_id'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/telegram.php' => config_path('telegram.php'),
        ]);
    }

}