<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(){
        $customer = ProductGallery::all()->count();
        $transaction = Transaction::all()->where('transaction_status','SUCCESS')->count();
        $pending = Transaction::all()->where('transaction_status','PENDING')->count();
        return view('backend.dashboard',compact('customer','transaction','pending'));
    }
}
