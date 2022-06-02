@extends('frontend.include.app')

@section('content')

    <!-- Page Content -->

    <div class="page-content page-categories">

        {{-- <h3 class="container-fluid mr-2 mt-2 text-center" data-aos="fade-right" data-aos-delay="500" > ORDER HISTORY </h3>
        <div class="card">
            <div class="col-12 mt-2">
                    <div class="card-body">
                        <table class="table container" data-aos="fade-right" data-aos-delay="900">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" class="pt-4 pb-4">Code Order</th>
                                <th scope="col" class="pt-4 pb-4">Total Price</th>
                                <th scope="col" class="pt-4 pb-4">Name</th>
                                <th scope="col" class="pt-4 pb-4">Status</th>
                                <th scope="col" class="pt-4 pb-4">Payment</th>
                                <th scope="col" class="pt-4 pb-4">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $item)
                                <tr>
                                    <td>
                                       <h4> {{$item  -> code}} </h4>
                                       <p> {{ $item  -> created_at }}</p>
                                    </td>
                                    <td>
                                        {{$item -> total_price}}
                                    </td>
                                    <td>
                                        {{$item -> name}}
                                    </td>
                                    <td>
                                        {{$item  -> province}}
                                    </td>
                                    <td>
                                        {{$item  -> transaction_status}}
                                    </td>

                                    <td>
                                        <form action="{{ route('ordershow',$item  -> id)}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                            <button type="submit" class="btn btn-primary"> Show </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="card p-3">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="" class="btn btn-info" style="width: 100%"> Semua </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="btn btn-info" style="width: 100%"> Belum Bayar </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="btn btn-info" style="width: 100%"> Dikirim </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="btn btn-info" style="width: 100%"> Selesai </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card p-2">
                @foreach ($history as $item)
                    <div class="col-md-12">
                        <div class="title d-flex justify-content-between row">
                            <img src="{{ asset('frontend/images/icon-marketplace.png') }}" width="40px" height="40px"
                                alt="">
                            <p class="mt-2"> <strong> Pembelian </strong> {{ $item->created_at }} </p>
                            <div>
                                <p class="btn btn-info"> {{ $item->transaction_status }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection

@section('fixed', 'fixed-bottom')
