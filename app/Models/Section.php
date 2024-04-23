<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Observers\SectionObserver;


class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'id',

    ];
    protected static function boot(){
        parent::boot();
        Section::observe(SectionObserver::class);
    }
    public function products(){
       return $this->hasMany(Product::class,'section_id');
    }
}
