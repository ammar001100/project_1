<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temp;

class Tempp extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'temp_id',
        'quantity',
        'total',
        'product_price',
        'product_price_sale',
        'product_name',
        'product_unit',
        'id',

    ];
    public function client(){
        return $this->belongsTo(Temp::class);
    }
}
