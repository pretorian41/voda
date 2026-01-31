<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class OrderDTO
{
    #[Assert\NotBlank(message: 'Вкажіть імʼя')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Імʼя занадто коротке'
        ),
    ]
    public string $name;
    #[Assert\NotBlank(message: 'Вкажіть телефон')]
    #[
        Assert\Regex(
            pattern: '/^\+?38?\s?\(?0\d{2}\)?\s?\d{3}[\s\-]?\d{2}[\s\-]?\d{2}$/',
            message: 'Невірний формат телефону'
        )
    ]
    public string $phone;
    #[Assert\NotBlank(message: 'Вкажіть кількість')]
    #[Assert\GreaterThanOrEqual(
value: 1,
message: 'Мінімум 1 бутель'
)]
    #[Assert\LessThanOrEqual(
    value: 20,
    message: 'Максимум 20 бутелів'
    )]
    public int $amount;
    #[Assert\NotBlank(message: 'Вкажіть адресу доставки')]
    #[Assert\Length(
min: 10,
minMessage: 'Адреса занадто коротка'
)]
    public string $address;
}
