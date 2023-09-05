<?php

namespace App\Enums;

enum StatusEnum: int
{
    case Active = 1;
    case NotActive = 0;

    public function label(): string
    {
        return match ($this) {
            self::Active => __('status.active'),
            self::NotActive => __('status.not_active')
        };
    }
}
