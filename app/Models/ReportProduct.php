<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'report_order_id',
        'order_num',
        'client_name',
        'client_id',
        'product_name',
        'product_id',
        'product_price',
        'product_price_sale',
        'product_unit',
        'product_quantity',
        'product_total',
        'won',
        'order_date',

    ];
    public function reportOrder(){
        return $this->belongsTo(ReportOrder::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
     }
     public function client(){
        return $this->belongsTo(Client::class);
     }
}
