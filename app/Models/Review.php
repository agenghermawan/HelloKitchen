<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        'users_id','Products_id','review','rating',
    ];


    public function product(){
        return $this->belongsTo(Product::class, 'Products_id', 'id');
    }

    public function user(){
        return $this->hasOne( User::class, 'id', 'users_id');
    }
}