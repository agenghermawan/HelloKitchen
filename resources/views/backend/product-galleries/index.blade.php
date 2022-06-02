@extends('backend.include.app')

@section('title')
    Store Dashboard
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Product Gallery</h2>
                <p class="dashboard-subtitle">
                    List of Gallery
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('product-galleries.create') }}" class="btn btn-primary mb-3" style="background-color: #fb5f87">
                                    + Add New Gallery 
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Photos</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->id }}
                                                    </td>
                                                    <td>
                                                        {{ $item->product->ProductName }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ Storage::url($item->Photos) }}" alt=""
                                                            class="img-thumbnail" width="100px" height="80px">
                                                    </td>
                                                    <td>
                                                            <form action="{{route('product-galleries.destroy',$item->id)}}" method="POST" enctype="multipart/form-data" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="d-inline btn btn-warning"> Delete </button>
                                                            </form>
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
            </div>
        </div>
    </div>
@endsection


@push('addon-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'product.name',
                    name: 'product.name'
                },
                {
                    data: 'photos',
                    name: 'photos'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });

    </script>
@endpush
