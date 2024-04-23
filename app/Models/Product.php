<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Section;

class Product extends Model
{
    use HasFactory;
    protected $dateFormat;
    protected $fillable = [
        'name',
        'description',
        'unit',
        'price',
        'price_sale',
        'date_e',
        'date_p',
        'stock',
        'section_id',

    ];
    public function section(){
       return $this->belongsTo(Section::class,'section_id');
    }

}
