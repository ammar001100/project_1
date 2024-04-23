<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_num',
        'client_name',
        'client_id',
        'user_id',
        'user_name',
        'total',
        'order_date',
        'axing',
        'won',
        'active',

    ];

    public function reportProducts()
    {
        return $this->hasMany(ReportProduct::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
