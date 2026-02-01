<?php

namespace App\Telegram;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramSender
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $botToken,
        private string $ordersChatId,
    ) {}

    public function send(string $message): bool
    {
        try {
            $response = $this->httpClient->request('POST',
                sprintf('https://api.telegram.org/bot%s/sendMessage', $this->botToken),
                [
                    'json' => [
                        'chat_id' => $this->ordersChatId,
                        'text' => $message,
                        'parse_mode' => 'MarkdownV2',
                    ],
                ]
            );
            $data = json_decode($response->getContent(), true);
            return $data['ok'] ?? false;
        } catch (\Throwable $exception) {
            return false;
        }
        return true;
    }
}
