@extends('frontend.include.app')

@section('content')

    <!-- Page Content -->
    <div class="page-content page-categories">
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h5 class="text-center"> Categories</h5>
                        <img src="{{ asset('frontend/images/dagingbg.png') }}" alt="">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a class="component-categories d-block" href="{{ route('ctigasapi') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/dagingigasapi.jpg') }}" alt="Gadgets Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                Daging Iga Sapi
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-categories d-block" href="{{ route('ctayam') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/dagingayam.jpg') }}" alt="Furniture Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                Daging Ayam
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <a class="component-categories d-block" href="{{ route('cthas') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/daginghas2.jpg') }}" alt="Makeup Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                Daging has
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-new-products mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h5 class="text-center"> Product Daging Iga Sapi  </h5>
                        <img src="{{ asset('frontend/images/daging3.png') }}" width="80px" height="57px" alt="">
                    </div>
                </div>
                <div class="row mt-5">
                    @php $incrementProduct = 0 @endphp
                    @foreach ($data as $item)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-right"
                            data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a class="component-products d-block" href="{{ route('detail', $item->id) }}">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="background-image: url('{{ Storage::url($item->galleries->first()->Photos) }}');">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ $item->ProductName }}
                                </div>
                                <div class="products-price">
                                    Rp {{ number_format($item->Price)  }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>


@endsection
