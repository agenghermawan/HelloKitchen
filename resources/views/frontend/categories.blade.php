@extends('frontend.include.app')

@section('content')
    <!-- Page Content -->
    <div class="page-content page-categories">
        <section class="store-trend-categories">
            <div class="container">
                <div class="row" style="color: #fb5f88">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h1 class="text-center" style="font-weight: 700"> Menus</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-5" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                                <li data-target="#storeCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontend/images/food/Brownies cookies.jpeg') }}" height="400px"
                                        style="border-radius: 20px;object-fit:cover" class="d-block w-100 "
                                        alt="Carousel Image" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Brownies Cookies</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/food/Brownies Keju 2.jpeg') }}"
                                        class="d-block w-100 " style="border-radius: 20px;object-fit:cover" height="400px"
                                        alt="Carousel Image" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Brownies Keju</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/food/Brownies Keju.jpeg') }}"
                                        class="d-block w-100 " style="border-radius: 20px;object-fit:cover" height="400px"
                                        alt="Carousel Image" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-md-4 col-12">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p style="font-weight: 700"> Semua Product </p>
                                    </div>
                                    <div>
                                        {{-- <img src="{{ Storage::url($dt->image) }}" width="40px" height="40px" alt=""
                                            style="border-radius: 100%"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($category as $dt)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p style="font-weight: 700"> {{ $dt->name }} </p>
                                            </div>
                                            <div>
                                                <img src="{{ Storage::url($dt->image) }}" width="40px" height="40px"
                                                    alt="" style="border-radius: 100%">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="col-md-8 col-12">
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col-md-6 product-categories">
                                    <a href="{{ route('detail', $item->id) }}" style="text-decoration: none">
                                        <div class="product-image" style="position: relative">
                                            <img src="{{ Storage::url($item->ThumbnailPhoto) }}" class=""
                                                width="100%" height="250px" style="border-radius: 15px" shadow" alt="">
                                            @auth
                                                <form class="addtocard">
                                                    <input type="hidden" name="addtocard" id="addtocard" value="true">
                                                    <input type="hidden" name="id" value="{{ $item->id }}" id="product-id">
                                                    <button type="submit" class="btn add-to-card btn-info"
                                                        style="position: absolute;bottom:0%;right:0%">
                                                        Add to cart {{ $item->id }}
                                                    </button>
                                                </form>
                                            @endauth
                                        </div>
                                        <div class="product-title d-flex justify-content-between">
                                            <p style="font-weight: 600;padding-top: 10px;font-size:18px">
                                                {{ $item->ProductName }}
                                            </p>
                                            <p style="font-weight: 600;padding-top: 10px;font-size:18px">
                                                Rp. {{ number_format($item->Price) }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- @foreach ($category as $item)
                        <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a class="component-categories d-block" href="">
                            <div class="categories-image">
                                <img src="{{ Storage::url($item->image) }}" style="border-radius: 0 20px" alt="Gadgets Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                {{$item->name}}
                            </p>
                        </a>
                    </div>
                    @endforeach --}}
                </div>
            </div>
        </section>

    </div>
    @auth
        @php
        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
        @endphp
    @endauth
    @guest
        @php
        $carts = 0;
        @endphp
    @endguest
@endsection

@push('addon-style')
    <style>
        .product-categories {
            transition: transform .5s ease;
        }

        .product-categories:hover {
            transform: scale(1.1);
        }

    </style>
@endpush

@push('addon-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        $(".addtocard").submit(function(event) {
            event.preventDefault();
            var idproduct = $('#product-id').val();
            var addtocard = $('#addtocard').val();

            var Data = {
                id: idproduct,
                addtocard: "true",
            }
            console.log(idproduct)
            var addtocard = $.ajax({
                type: 'post',
                url: "/detail/" + idproduct,
                data: Data,
                dateType: "text",
                success: function(result) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Memasukan ke keranjang'
                    })
                    var carts = parseInt({{ $carts }})
                    console.log(carts);
                    $(".cart-badge").html(carts + 1)
                }
            })
            addtocard.error(function(e) {
                console.log(e);
                alert('salah')
            })
        })
    </script>
@endpush
