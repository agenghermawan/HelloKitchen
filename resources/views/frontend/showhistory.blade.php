@extends('frontend.include.app')

@section('content')
    <!-- Page Content -->

    <div class="page-content page-categories">

        <h2 class="container mr-2 mb-5 font-weight-bold"> Order History </h5>

    </div>
    <div class=" container">
        <div class="col-12 mt-2">
            <div class="card-body">
                <h4 class="font-weight-bold"> Order ID/{{ $history->code }}/{{ $history->transaction_status }}/
                    {{ $history->created_at }} </h4>
                <hr>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Billing Address </h4>
                        <p class="mt-4"> {{ $history->name }} <br>
                            {{ $history->email }} <br>
                            <br>
                            {{ $history->address_one }} <br>
                            {{ $history->address_two }} <br>
                            {{ $history->phone }} <br>
                            {{ $history->province }} <br>
                            {{ $history->city }} <br>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> DETAILS</h4>
                        <p class="mt-4"> {{ $history->code }} <br>
                            {{ $history->created_at }} <br>
                            Status : {{ $history->transaction_status }} <br>
                            {{ $history->zip_code }} <br>
                            {{ $history->phone }} <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="col-12 mt-5">
            <table class="table responsive">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $item->product->ProductName }}
                            </td>
                            <td>
                                <img width="100px" height="80px" class="img-thumbnail"
                                    src="{{ Storage::url($item->product->galleries->first->Photos->Photos) }}" alt="">
                            </td>
                            <td>
                                {{ $item->product->Categories }}
                            </td>
                            <td>
                                {{ $item->product->Weight }}
                            </td>
                            <td>
                                {{ $item->quantity }}
                            </td>
                            <td>
                                {{ $item->product->Description }}
                            </td>
                            <td>
                                {{ $item->product->Price }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container col-12 mb-5">
            <div class="row">
                <div class="col-lg-8">

                </div>
                <div class="col-lg-4">
                    <div class="row">

                        <div class="col-md-6">
                            <h4> Total Price </h4>
                        </div>
                        <div class="col-md-6">
                            <h4> {{ $history->total_price }} </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
