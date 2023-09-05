<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DateTimeCast implements CastsAttributes
{

    public function get(Model $model, string $key, mixed $value, array $attributes): array
    {
        $parse = Carbon::parse($value);
        return [
            'date_time' => $parse->format('Y-m-d H:i:s'),
            'date' => $parse->format('Y-m-d'),
            'year' => $parse->format('Y'),
            'month' => $parse->format('m'),
            'week' => $parse->format('w'),
            'day' => $parse->format('d'),
            'hour' => $parse->format('H')
        ];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes)
    {

    }
}
