@extends('backend.include.app')

@section('content')


    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Products</h2>
                <p class="dashboard-subtitle">
                    Manage it well and get money
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success">Add New Product</a>
                    </div>
                </div>
                <div class="row mt-4">
                    @foreach ($data as $item)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a class="card card-dashboard-product d-block" href="/dashboard-products-details.html">
                                <div class="card-body">
                                    @if (!$item->galleries->isEmpty())
                                        <img src="{{ Storage::url($item->ThumbnailPhoto) }}" alt=""
                                            height="200px" class="w-100 mb-2" />
                                    @else
                                        <img src="" alt="" height="140px" class="w-100 mb-2" />
                                    @endif
                                    <div class="product-title">{{ $item->ProductName }}</div>
                                    <div class="product-category">{{ $item->Categories }}</div>
                                </div>
                                <a href="{{ route('product.edit',$item->id)}}" class="btn btn-info"> Edit </a>
                                <form action="{{ route('product.destroy',$item -> id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning"> Delete </button>
                                </form>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
