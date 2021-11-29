<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];
    // fillable에 다적은거랑 같다 !보안상위험
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function getImageAttribute($value){
        return '/storage/' .$value;
    }
}
