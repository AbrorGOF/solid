<?php

namespace App\Helpers;

class DateTimeHelper
{
    public function __construct()
    {
    }

    public function date(): string
    {
        dd($this);
        return $this->date->format('Y-m-d');
    }
}
