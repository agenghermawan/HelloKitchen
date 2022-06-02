<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Exception;
use Midtrans\Snap;
use Midtrans\Config;


class CheckoutController extends Controller
{

    public function checkoutdata(Request $request)
    {
        DB::table('carts')->update([
            'Quantity' => $request -> Quantity,
        ]);

        $user = Auth::user();
        $request -> all();
        $name = $request -> name;
        $totalprice = $request -> totalprice;
        $email = $request -> email;
        $address_one = $request -> address_one;
        $address_two = $request -> address_two;
        $province = $request -> province;
        $courier = $request-> courier;
        $noteaddress = $request->notes_address;
        $zip_code = $request -> zip_code;
        $phone = $request -> phone;
        $Quantity = $request -> Quantity;

        if($request->courier == 'JNE'){
            $priceOngkir = 15000;
        }else{
            $priceOngkir = 30000;
        }

                 $carts = Cart::with(['product','user'])
                 ->where('users_id', Auth::user()->id)
                 ->get();

        return view('frontend.paymentorder',compact('name','Quantity','totalprice','email','address_one','address_two',
        'province','zip_code','phone','carts','noteaddress','courier','priceOngkir'));
    }

    public function process(Request $request)
    {
        if ($request->payment == "manualPayment"){
            $user = Auth::user();
            $code = 'STORE-' . mt_rand(0000,9999);

            $carts = Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->get();

            $transaction = Transaction::create([
                'users_id' => Auth::user()->id,
                'total_price' => $request->total_price,
                'transaction_status' => 'PENDING',
                'name' => $request -> name,
                'email' => $request -> email,
                'address_one' =>  $request -> address_one,
                'address_two' =>  $request -> address_two,
                'province' => $request -> province,
                'notes_address' => $request->notes_address,
                'courier' => $request -> courier,
                'zip_code' => $request -> zip_code,
                'phone' => $request -> phone,
                'code' => $code,
                'method' => 'manual',
                'evidence' => $request->file('evidence')->storeAs('image/evidence',$request->file('evidence')->getClientOriginalName(), 'public'),
            ]);

            foreach ($carts as $cart) {
                TransactionDetail::create([
                    'transactions_id' => $transaction->id,
                    'products_id' => $cart->product->id,
                    'price' => $cart->product->Price,
                    'quantity' => $cart-> Quantity,
                ]);
            }

            Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->delete();

            return redirect()->route('success');

        } else{

            $user = Auth::user();
            $code = 'STORE-' . mt_rand(0000,9999);

            $carts = Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->get();

            $transaction = Transaction::create([
                'users_id' => Auth::user()->id,
                'total_price' => $request->total_price,
                'transaction_status' => 'PENDING',
                'name' => $request -> name,
                'email' => $request -> email,
                'address_one' =>  $request -> address_one,
                'address_two' =>  $request -> address_two,
                'province' => $request -> province,
                'city' => $request -> city,
                'zip_code' => $request -> zip_code,
                'phone' => $request -> phone,
                'code' => $code
            ]);

            foreach ($carts as $cart) {
                TransactionDetail::create([
                    'transactions_id' => $transaction->id,
                    'products_id' => $cart->product->id,
                    'price' => $cart->product->Price,
                    'quantity' => $cart-> Quantity,
                ]);
            }

            Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->delete();

            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            $midtrans = array(
                'transaction_details' => array(
                    'order_id' =>  $code,
                    'gross_amount' => (int) $request->total_price,
                ),
                'customer_details' => array(
                    'first_name'    =>  $request -> name,
                    'email'         =>  $request -> email,
                ),

                'enabled_payments' => array('gopay','bank_transfer','permata_va','bca_va'),
                'vtweb' => array()
            );
            try {
                // Ambil halaman payment midtrans
                $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

                // Redirect ke halaman midtrans
                return redirect($paymentUrl);
            }
            catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function order()
    {
    //    $carts = Cart::with(['product.galleries', 'user'])
    //    ->where('users_id', Auth::user()->id)
    //    ->get();

       $transaction = Transaction::orderBy('id','DESC')
       ->where('users_id',Auth::user()->id)->first();

        // $transactiondetail = TransactionDetail::with('product.galleries','transaction')->where('id',$transaction->id)->get();

    //    return view('frontend.paymentorder',compact('carts','transaction','transactiondetail'));
    }

    public function callback(Request $request)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notification = new Notification();

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        $transaction = Transaction::findOrFail($order_id);

        if($status == 'capture'){
            if($type = 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else{
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }
        else if($status == 'pending'){
            $transaction->status = 'PENDING';
        }
        else if($status == 'deny'){
            $transaction->status = 'CANCELLED';
        }
        else if($status == 'expire'){
            $transaction->status = 'CANCELLED';
        }
        else if($status == 'cancel'){
            $transaction->status = 'CANCELLED';
        }

        $transaction->save();
    }
}
