@extends('frontend.include.app')

@section('content')

    <!-- Page Content -->

    <div class="page-content page-categories">
        <div class="container">
            <div class="card p-3">
                <div class="col-md-12">
                    <form action="{{route('orderhistory')}}" method="GET">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <button class="btn-info w-100 border-0 rounded" type="submit" name="status" value="all" style="padding:0.375rem 0.75rem"> Semua</button>
                            </div>
                            <div class="col-md-3 mb-3">
                                <button class="btn-info w-100 border-0 rounded" type="submit" name="status"  value="PENDING"  style="padding:0.375rem 0.75rem"> Belum Bayar</button>
                            </div>
                            <div class="col-md-3 mb-3">
                                <button class="btn-info w-100 border-0 rounded" type="submit" name="status" value="shipping"  style="padding:0.375rem 0.75rem"> Dikirim </button>
                            </div>
                            <div class="col-md-3 mb-3">
                                <button class="btn-info w-100 border-0 rounded" type="submit" name="status"  value="SUCCESS" style="padding:0.375rem 0.75rem"> Selesai </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="p-2">
                @foreach ($history as $item)
                <a href="{{route('ordershow' ,$item->id)}}" style="text-decoration: none">
                    <div class="card col-md-12 px-4">
                        <div class="title d-flex justify-content-between row p-3">
                            <img src="{{ asset('frontend/images/icon-marketplace.png') }}" width="40px" height="40px"
                                alt="">
                            <p class="mt-2"> <strong> Pembelian : </strong> {{ $item->created_at }} </p>
                            <div>
                                <p class="btn btn-light"> {{ $item->transaction_status }}</p>
                            </div>
                        </div>
                        <div class="row">
                            @php
                                $getAllProduct = App\Models\TransactionDetail::where('transactions_id',$item->id)->with('product','transaction')->get();
                            @endphp
                            @foreach($getAllProduct as $item)
                                <div class="col-md-2 mb-2">
                                    <img src="{{Storage::url($item->product->ThumbnailPhoto) }}" style="border-radius: 20px" alt="" class="img-fluid"> 
                                </div>
                                <div class="col-md-8">
                                    <h5 style="font-weight: 600"> {{$item->product->ProductName}} </h5>
                                    <p> Quantity : {{$item->quantity}} </p>
                                </div>
                                <div class="container col-md-2 row align-items-center">
                                    Total Harga : Rp. {{ number_format($item->product->Price)}}
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-primary"> Detail Transactions</button>
                            <h4> Total Pesanan : <span class="text-danger"> RP {{number_format($item->transaction->total_price)}} </span></h4>
                        </div>
                    </div>
                    <hr>
                </a>
                @endforeach
            </div>

        </div>

    </div>
@endsection

@section('fixed', 'fixed-bottom')
