<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'product_id',
        'client_id',
        'quantity',
        'price',
        'price_sale',
        'total',
        'product_name',
        'product_unit',

    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
     }
     public function client(){
        return $this->belongsTo(Client::class);
     }
     
}
