<?php

if (!function_exists('telegram')) {

    /**
     * @param string $message
     * @param int|null $chatId
     * @return \unreal4u\TelegramAPI\Abstracts\TelegramTypes
     */
    function telegram($message, $chatId = null)
    {
        return app(\Pdewit\TelegramLogger\TelegramLogger::class)->sendMessage($message, $chatId);
    }
}