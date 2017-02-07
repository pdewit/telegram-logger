<?php


namespace Pdewit\TelegramLogger\Tests;


use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;
use Pdewit\TelegramLogger\TelegramLogger;
use unreal4u\TelegramAPI\Telegram\Types\Message;

class TelegramTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return ['Pdewit\TelegramLogger\TelegramLoggerServiceProvider'];
    }

    public function testSendMessage()
    {
        $response = app()->make(TelegramLogger::class)->sendMessage('test');

        $this->assertTrue($response instanceof Message);
    }

    public function testDisablingInConfig()
    {
        Config::set('telegram.enabled', false);
        Config::set('telegram.token', '');

        $response = app()->make(TelegramLogger::class)->sendMessage('test');

        $this->assertFalse($response instanceof Message);
    }
}