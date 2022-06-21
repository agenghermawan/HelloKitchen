<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','image'
    ];

    // public function product()
    // {
    //     return $this->hasOne(product::class,'category_id','id');
    // }

    public function product()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
