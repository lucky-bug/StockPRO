<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockValue extends Model
{
    protected $fillable = [
        'stock_id',
        'time',
        'value',
    ];
}
