@extends('backend.include.app')

@section('content')

<div class="section-content section-dashboard-home" >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">
                Transaction Order 
            </p>
        </div>
        <div class="card">
            <div class="col-12 mt-2">
                    <div class="card-body">
                        <table class="table">
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
                                        <a href="{{ route('transaction.show',$item->id)}}" class="btn btn-warning"> Show </a>
                                        <a href="{{ route('transaction.edit',$item->id)}}" class="btn btn-warning"> Edit </a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
