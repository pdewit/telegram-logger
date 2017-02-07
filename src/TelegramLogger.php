<?php


namespace Pdewit\TelegramLogger;


use GuzzleHttp\Client;
use unreal4u\TelegramAPI\InternalFunctionality\DummyLogger;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use unreal4u\TelegramAPI\TgLog;

class TelegramLogger
{
    private $token;
    private $chatId;
    private $guzzle;
    private $telegram;

    /**
     * TelegramLogger constructor.
     * @param string $token
     * @param int $chatId
     * @param Client|null $guzzle
     */
    public function __construct($token, $chatId, $guzzle = null)
    {
        $this->token = $token;
        $this->chatId = $chatId;

        if($guzzle == null){
            $this->guzzle = new Client();
        }

        $this->setUp();
    }

    /**
     * @throws TelegramException
     */
    private function setUp()
    {
        if(!config('telegram.enabled')) return false;

        if($this->token == ''){
            throw new TelegramException('Telegram Token not set in config files.');
        }

        if($this->chatId == ''){
            throw new TelegramException('Telegram chat ID not set in config files.');
        }

        $this->telegram = new TgLog($this->token, new DummyLogger(), $this->guzzle);
    }

    /**
     * @param $text
     * @param int|null $chatId
     * @return \unreal4u\TelegramAPI\Abstracts\TelegramTypes
     */
    public function sendMessage($text, $chatId = null)
    {
        if(!config('telegram.enabled')) return false;

        if($chatId == null){
            $chatId = $this->chatId;
        }

        $message = new SendMessage();
        $message->chat_id = $chatId;
        $message->text = $text;


        try {
            return $this->telegram->performApiRequest($message);
        }catch(\Exception $e){
            return null;
        }
    }

}