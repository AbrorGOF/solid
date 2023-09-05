<?php

namespace App\Models;

use App\Casts\MoneyAmountCast;
use App\Casts\VatSumCast;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'amount',
        'vat_sum',
        'status'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'vat_sum' => VatSumCast::class,
        'amount' => MoneyAmountCast::class
    ];
}
