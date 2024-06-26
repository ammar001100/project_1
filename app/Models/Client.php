<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'temp_id',
        'user_id',
        'axing',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
     }
     public function orders(){
        return $this->hasMany(Order::class,'client_id');
     }
}
