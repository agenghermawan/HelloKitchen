<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateProfileRequest;
use App\Models\Cart;
use App\Models\category;
use App\Models\Review;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class LandingPageController extends Controller
{
    public function index(){
       $data  =  Product::with('galleries')->get()->take(8);
       $suggestproduct  =  Product::with('galleries')->get()->take(3);
       return view('frontend.LandingPage',compact('data','suggestproduct'));
    }
    public function detail($id){
        $review = Review::with('product','user')->where('Products_id',$id)->get();

       $data =  Product::with('galleries')->findOrFail($id);
        return view('frontend.details',compact('data','review'));
    }
        public function add(Request $request,$id){
            $cek = Cart::where('users_id',Auth::user()->id)
                        ->where('Products_id',$id)
                        ->first();
                $data = [
                    'products_id' => $id,
                    'users_id' => Auth::user()->id
                ];
            if($cek == null){
                Cart::create($data);
                if($request->addtocard == true){
                    return 'Berhasil menambahkan data';
                }else{
                    return redirect()->route('cart.index');
                }
            }else{
                return redirect()->route('cart.index');
            }
    }

        public function categories(){
         $data  =  Product::with('galleries')->get();
         $category = category::all();
        return view('frontend.categories',compact('data','category'));

    }

    public function addreview(Request $request,$id)
    {
        $data =  $request -> all();
        $data['users_id'] = Auth::user()->id;
        $data['Products_id'] = $id;

        Review::create($data);
        return redirect()->route('detail',$id);

    }

    public function orderhistory()
    {
        $history = Transaction::with('transactiondetail.product.galleries')->where('users_id',Auth::user()->id)->get();
        return view('frontend.orderhistory',compact('history'));
    }

    public function ordershow(Request $request, $id)
    {
        $history = Transaction::with('transactiondetail.product.galleries')->where('id',$id)->first();
        $items = TransactionDetail::with('transaction','product.galleries')->where('transactions_id',$id)->get();
        return view('frontend.showhistory',compact('history','items'));
    }
    public function aboutme(){
        return view('frontend.about');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function editProfile($id)
    {
        $data = User::find($id);
        return view('frontend.editprofile',compact('data'));
    }
    public function updateProfile(Request $request, $id)
    {
        dd($request->file('avatar'));
        $data = $request->all();
        Validator::make($data, [
            'name' => ['required'],
            'email' => ['required'],
            'telp' => ['required'],
            'old_password' => ['required'],
            'new_password' => ['required'],
            'password_confirm' => ['same:new_password'],
        ])->validate();

        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['old_password'], $user->password)) {
            return back()->with('error', 'The specified password does not match the database password');
        }

        if($request->file('avatar')){
            $data['store'] = $request->file('avatar')->store('image/avatar','public');
        }

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->new_password),
        ]);

        return back();
    }
    public function success()
    {
        return view('frontend.successfully');
    }
}
