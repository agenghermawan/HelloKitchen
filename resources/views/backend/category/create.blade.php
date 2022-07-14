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
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class=" form-group">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control" name="name">
                                                @error('name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="thumbnails">Description Category</label>
                                                <textarea name="description" id="" class="form-control " cols="10" rows="2"></textarea>
                                                @error('description')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted">
                                                    Kamu dapat menambahkan descripsi kategori
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="thumbnails">Image Category</label>
                                                <input type="file" class="form-control" name="image">
                                                @error('description')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted">
                                                    Kamu dapat menambahkan descripsi kategori
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-success btn-block px-5">
                                        Save Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
