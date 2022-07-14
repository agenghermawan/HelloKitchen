<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Product::with('galleries')->get();
        return view('backend.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::select('name','id')->get();
        return view('backend.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $data['ThumbnailPhoto'] = $request->file('ThumbnailPhoto')->store('assets/product', 'public',$request->file('ThumbnailPhoto')->GetClientOriginalName());

        $product =  Product::create($data);
        $gallery = [
            'Products_id' => $product -> id,
            'Photos' =>  $request->file('ThumbnailPhoto')->store('assets/product', 'public'),
        ];

        ProductGallery::create($gallery);
        toast('Berhasil menambahkan product','success');
        return redirect()->route('product.index');
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
        $data = [
          'product' => Product::findOrFail($id),
          'category' => category::all(),
        ];
        return view('backend.product.edit',compact('data'));
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
        if(empty($request->ThumbnailPhoto)){
            $item = Product::findOrFail($id);
            $data = $request -> all();
            $insert =  $item -> update($data);
        }
        else{
            $item = Product::findOrFail($id);
            $data = $request -> all();
            $data['ThumbnailPhoto'] = $request->file('ThumbnailPhoto')->store('assets/product', 'public',$request->file('ThumbnailPhoto')->GetClientOriginalName());
            $insert =  $item -> update($data);
        }

        toast('Berhasil menghapus product','success');
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGallery::with('Product')->where('Products_id',$id)->delete();
        Product::findOrFail($id)->delete();
         toast('Berhasil menghapus product','success');
        return redirect()->route('product.index');
    }
}
