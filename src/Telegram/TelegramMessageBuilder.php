<?php

namespace App\Telegram;

use App\DTO\OrderDTO;

class TelegramMessageBuilder
{
    public function prepareTelegramMessage(OrderDTO $order): string
    {
        return $this->escape(trim(sprintf(
            "🧾 *Нове замовлення води*\n\n".
            "👤 *Імʼя:* %s\n".
            "📞 *Телефон:* `%s`\n".
            "💧 *Кількість:* *%d бут.*\n".
            "📍 *Адреса:*\n%s",
            $order->name,
            $order->phone,
            $order->amount,
            $order->address,
        )));
    }

    private function escape(string $text): string
    {
        // Telegram Markdown safe
        return str_replace(
            ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'],
            array_map(fn ($c) => '\\' . $c, ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!']),
            $text
        );
    }
}
