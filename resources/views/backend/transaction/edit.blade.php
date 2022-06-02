@extends('backend.include.app')

@section('content')

    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Add New Product</h2>
                <p class="dashboard-subtitle">
                    Create your own product
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('transaction.update', $history->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Buyer Name</label>
                                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                                     value="{{ $history->name }}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Code </label>
                                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                                     value="{{ $history->code }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Price </label>
                                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                                     value="{{ $history->total_price }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Phone </label>
                                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                                     value="{{ $history->phone }}" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="transaction_status">Transaction Status</label>
                                                <select class="form-control"  name="transaction_status">
                                                    <option>  {{$history -> transaction_status}} </option>
                                                    @if ($history -> transaction_status == 'PENDING')
                                                    <option> SUCCESS</option>
                                                    <option>ON DELIVERY</option>
                                                    <option>FAILED</option>
                                                    @elseif($history -> transaction_status == 'SUCCESS')
                                                    <option>ON DELIVERY</option>
                                                    <option>PENDING </option>
                                                    <option>FAILED </option>
                                                    @elseif($history -> transaction_status == 'ON DELIVERY')
                                                    <option>SUCCESS</option>
                                                    <option>PENDING </option>
                                                    <option>FAILED </option>
                                                    @elseif($history -> transaction_status == 'FAILED')
                                                    <option>SUCCESS</option>
                                                    <option>PENDING </option>
                                                    <option>ON DELIVERY </option>
                                                    @endif
                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block px-5">
                                                    Save Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
