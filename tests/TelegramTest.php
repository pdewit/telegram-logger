<?php


namespace Pdewit\TelegramLogger\Tests;


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
}