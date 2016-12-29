# Easy Telegram Logger for Laravel

A very simple Telegram logger built for Laravel (but can be used without) that includes a helper function to make sending quick short messages easy.

## Using it with Laravel
### Installation
Add the following properties to your .env file:

```
TELEGRAM_BOT_TOKEN=12345678
TELEGRAM_CHAT_ID=123456
```

And add the service provider to your `config/app.php`:
```php
'providers' => [
    \Pdewit\TelegramLogger\TelegramLoggerServiceProvider::class
],
```

### Usage

You should then be able to use it with the following simple function:

```php
telegram('This is a test!');
```

### Testing
If you want to use the tests, edit the configuration files in phpunit.xml:
```xml
<php>
    <env name="TELEGRAM_BOT_TOKEN" value="1234"/>
    <env name="TELEGRAM_CHAT_ID" value="1234"/>
</php>
```