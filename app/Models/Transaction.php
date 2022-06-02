<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
USE Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;
        protected $fillable = [
        'users_id',
        'total_price',
        'transaction_status',
        'name',
        'email',
        'address_one',
        'address_two',
        'notes_address',
        'courier',
        'zip_code',
        'province',
        'phone',
        'city',
        'code',
        'method',
        'evidence',
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id');
    }
    public function transactiondetail(){
        return $this->hasOne( TransactionDetail::class, 'transactions_id', 'id');
    }


    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attribute['created_at'])
        ->translatedFormat('1, d F Y');
    }

}
