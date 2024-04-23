<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Tempp;

class Temp extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_number',
        'client_address',
        'axing',
        'id',

    ];
    public function product(){
        return $this->hasMany(Tempp::class);
    }
}
