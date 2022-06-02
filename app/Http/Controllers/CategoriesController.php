<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function ctigasapi(){
        $data  =  Product::with('galleries')->where('Categories','Daging Iga Sapi')->get();
        $item  =  Product::with('galleries')->where('Categories','Daging Iga Sapi')->first();
        return view('frontend.categories.ctigasapi',compact('data','item'));
    }
    public function cthas(){
        $data  =  Product::with('galleries')->where('Categories','Daging Has')->get();
       return view('frontend.categories.ctdaginghas',compact('data'));
    }
    public function ctayam(){
        $data  =  Product::with('galleries')->where('Categories','Daging Ayam')->get();
        return view('frontend.categories.ctdagingayam',compact('data'));
   }
}
