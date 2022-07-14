<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =  ProductGallery::with('product')->get();
        return view('backend.product-galleries.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Product::all();
        return view('backend.product-galleries.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = [
            'Products_id' => $request -> Products_id,
            'Photos' =>  $request->file('Photos')->store('assets/product', 'public'),
        ];

        ProductGallery::create($gallery);
        toast('Berhasil menambahkan foto product','success');
        return redirect()->route('product-galleries.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data =   ProductGallery::with('product')->where('id',$id)->first();
        return view('backend.product-galleries.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGallery::findOrFail($id)->delete();
        toast('Berhasil menghapus foto product','success');
        return redirect()->route('product-galleries.index');
    }
}
