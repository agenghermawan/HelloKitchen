@extends('backend.include.app')

@section('content')

    <div class="section-content section-dashboard-home">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                    Look what you have made today!
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Customer
                                </div>
                                <div class="dashboard-card-subtitle">
                                   {{$customer}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Success
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{$transaction}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Pending
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{$pending}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                     {{-- <div class="col-12 mt-2">
                        <h5 class="mb-3">Recent Transactions</h5>
                        @yield('content')
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
