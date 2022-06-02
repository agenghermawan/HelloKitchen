@extends('frontend.include.app')
@section('content')
    <!-- Page Content -->
    <div class="page-content" style="background-color: ">
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 col-sm-12 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <a class="component-categories d-block" href="{{ route('ctigasapi') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/food/about-background.jpg') }}" alt="Gadgets Categories"
                                    class="w-100" height="400px" style="object-fit: cover" />
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="categories-image" style="height: 455px">
                                <h1 data-aos="fade-right" data-aos-delay="500" style="color: #fb5f88">ABOUT ME</h1>
                                <p class="text-p mt-3" data-aos="fade-right" data-aos-delay="1000">
                                    Hello my name is Vinnotinto Rizky Anugrah S <br />
                                    I am a college student in University Gunadarma and studying
                                    <br />Information System
                                    <br />
                                    I am born in 7 July 2000, Jakarta
                                </p>
                                  <p data-aos="fade-right" data-aos-delay="1500">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"  style="background-color: #fb5f88" data-target="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Why Hello Kitchen ?
                                    </button>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card-pop card-body" style="color:#fb5f88">
                                        Hello kitchen diambil seakan-akan semua orang berasa di tanya kabarnya setiap hari
                                        kabar tersebut adalah kabar sama orang tersayang.
                                    </div>

                            </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
    
@endsection

@section('fixed','fixed-bottom')

