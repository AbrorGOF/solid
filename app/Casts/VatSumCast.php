<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

##========================================================================##
#                   Money amount transformation                            #
##========================================================================##
class VatSumCast implements CastsAttributes
{

    /**
     * Tiyin to som
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return float|int
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): float|int
    {
        return ($value / 100);
    }

    /**
     * Som to tiyin
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return int
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): int
    {
        return (round(($attributes['amount'] - ($attributes['amount'] / 1.12))));
    }
}
