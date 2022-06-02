@extends('frontend.include.app')
@section('content')
    @php
    use RealRashid\SweetAlert\Facades\Alert;
    @endphp
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
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
                                    <img src="{{ asset('frontend/images/food/Brownies cookies.jpeg') }}" height="600px"
                                        style="border-radius: 20px" class="d-block w-100 " alt="Carousel Image" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Brownies Cookies</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/food/Brownies Keju 2.jpeg') }}"
                                        class="d-block w-100 " style="border-radius: 20px" height="600px"
                                        alt="Carousel Image" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Brownies Keju</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/food/Brownies Keju.jpeg') }}"
                                        class="d-block w-100 " style="border-radius: 20px" height="600px"
                                        alt="Carousel Image" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <header class="text-center" data-aos="zoom-out">
            <h1 style="color: #fb6387">
                OUR FOOD <br />
                STRAIGHT TO YOUR HEART
            </h1>
            <p class="mt-3">Best in Town</p>
        </header>

        {{-- <section class="categories container mt-4" data-aos="zoom-out" data-aos-delay="100">
            <h3> Categories </h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                        <a class="btn btn-primary text-white" style="position: absolute; right:15px;border-radius:0 15px"> Best</a>
                    <img src="{{ asset('frontend/images/food/category-1.jpg') }}" style="object-fit: cover;" alt="Gadgets Categories"
                            class="w-100 h-100" height="193px" />
                        <p class="title-categories text-light"> Daging sapi </p>
                        <p class="title-text text-light text-muted" > Daging pilihan </p>
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('frontend/images/food/category-2.jpg') }}" style="object-fit: cover" alt="Gadgets Categories"
                            class="w-100 mb-3" height="193px"  />
                    <img src="{{ asset('frontend/images/food/category-3.jpg') }}" style="object-fit: cover" alt="Gadgets Categories"
                            class="w-100" height="193px" />
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('frontend/images/food/category-4.jpg') }}" style="object-fit: cover" alt="Gadgets Categories"
                            class="w-100 mb-3" height="193px" />
                    <img src="{{ asset('frontend/images/food/category-1.jpg') }}" style="object-fit: cover" alt="Gadgets Categories"
                            class="w-100" height="193px" />
                </div>
            </div>
        </section> --}}

        <div class="text-best text-center mt-2 mb-3" data-aos="fade-right" data-aos-delay="100">
            <h1>BEST SELLERS</h1>
            <img src="frontend/images/ic_star.png" alt="" />
            <img src="frontend/images/ic_star.png" alt="" />
            <img src="frontend/images/ic_star.png" alt="" />
            <img src="frontend/images/ic_star.png" alt="" />
        </div>


        <section class="menus">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-12 mb-3" data-aos="fade-up" >
                        <div class="row justify-content-between text-center">
                            <h2 class="text-center"> Best Sellers </h2>

                        </div>
                          <img src="frontend/images/ic_star.png" alt="" />
                         <img src="frontend/images/ic_star.png" alt="" />
                         <img src="frontend/images/ic_star.png" alt="" />
                         <img src="frontend/images/ic_star.png" alt="" />
                    </div>

                </div> --}}



                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="menu-item" style="position: relative">
                                <a href="{{ route('detail', $item->id) }}">
                                    <img src="{{ Storage::url($item->ThumbnailPhoto) }}" style="object-fit: cover"
                                        alt="Makeup Categories" class="w-100 shadow" height="217px" />
                                    <span class="btn btn-primary text-mute price-menu" style=""> Rp
                                        {{ $item->Price }}</span>
                                </a>
                            </div>
                            <p class="title-menu my-2"> {{ $item->ProductName }} </p>
                            <div class="row mx-auto">
                                @auth
                                    <form action="{{ route('detail-add', $item->id) }}" method="POST"
                                        enctype="multipart/form-data" class="mr-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success px-2 text-white btn-block mb-3"
                                            style="color: #fb6387">
                                            Buy Now
                                        </button>
                                    </form>
                                    <form class="addtocard">
                                        <input type="hidden" name="addtocard" class="addtocard" value="true">
                                        <input type="hidden" name="id" value="{{ $item->id }}" class="product-id">
                                        <button type="submit" class="btn add-to-card px-4 btn-block mb-3">
                                            Add to cart
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                    <form action="{{ route('detail-add', $item->id) }}" method="POST"
                                        enctype="multipart/form-data" class="mr-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success px-2 text-white btn-block mb-3">
                                            Buy Now
                                        </button>
                                    </form>
                                @endguest
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section>

            <div class="people text-center" data-aos="zoom-out">
                <h1 style="color: #fc9e56">
                    WHAT PEOPLE SAYS ABOUT US
                    <img src="frontend/images/ic_testi.png" alt="" />
                </h1>
                <p style="color: #fc9e56">We always serve you the best we can</ps>
            </div>

            <div class="container" style="margin-top: 100px">
                <section class="section section-testimonial-content" id="testimonialContent">
                    <div class="container">
                        <div class="section-popular-travel row justify-content-center">
                            <div class="col-sm-6 col-md-6 col-lg-4 " data-aos="fade-right" data-aos-delay="100">
                                <div class="card card-testimonial shadow text-center">
                                    <div class="testimonial-content">
                                        <img src="frontend/images/person-icon-1684.jpg" alt="User"
                                            class="mb-4 rounded-circle" />
                                        <h3 class="mb-4" style="color: #3252DF">ADITYA ZAKY</h3>
                                        <p class="testimonial">
                                            "Rasanya enak sekali, semakin menggugah selera makan"
                                        </p>
                                    </div>

                                    <hr />
                                    <p class="trip-to mt-2">Sambal Bawang</p>
                                </div>
                            </div>


                            <div class="col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="550">
                                <div class="card card-testimonial shadow text-center">
                                    <!--Kalau misalkan gambar orangnya tidak KOTAK pake class rounded-rectangle aja trus cssnya
                                                                                                              kasih radius tapi kalo gambar KOTAK pake aja class rounded-circle -->

                                    <div class="testimonial-content">
                                        <img src="frontend/images/person-icon-1684.jpg" alt="User"
                                            class="mb-4 rounded-circle" />
                                        <h3 class="mb-4" style="color: #3252DF">NOOR ARIF</h3>
                                        <p class="testimonial">"Best in price and quality"</p>
                                    </div>

                                    <hr />
                                    <p class="trip-to mt-2 styke">Brownies Keju</p>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-4" data-aos="fade-left" data-aos-delay="350">
                                <div class="card card-testimonial shadow text-center">
                                    <div class="testimonial-content">
                                        <img src="frontend/images/person-icon-1684.jpg" alt="User"
                                            class="mb-4 rounded-circle" />
                                        <h3 class="mb-4" style="color: #3252DF">PUTRA IMAN</h3>
                                        <p class="testimonial">
                                            "Pelayanannya sangat ramah, fast respon dan rasa sangat enak"
                                        </p>
                                    </div>

                                    <hr />
                                    <p class="trip-to mt-2">Brownies Plain</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>

                {{-- <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/images/bg5.jpg') }}" class="d-block" width="90%"
                        style="border-radius: 20px;border-radius: 100px 15px 15px 15px;" height="450px" alt="Carousel Image" />
                    </div>
                    <div class="col-md-6 p-5">
                        <h5> Review </h5>
                        <img src="{{ asset('frontend/images/start.png')}}" alt="">
                        <p class="font-weight-normal" style="font-size: 24px;line-height:36px" >
                            What a great food with my family and  <br/>
                            I should try again next time soon ...
                        </p>
                        <p>
                            Ageng, Product Designer
                        </p>
                        <button class="btn btn-primary px-2" style="background: #3252DF;
                        box-shadow: 0px 8px 15px rgba(50, 82, 223, 0.3);
                        border-radius: 4px;">
                            Beli Sekarang
                        </button>
                    </div> --}}

            </div> ?>
    </div>
    </section>
    <section class="container-footer" style="margin-top: 40px">
        <div class="footer-2-3 container-xxl mx-auto position-relative p-0" style="font-family: 'Poppins', sans-serif ;">
            <div class="border-color info-footer">
                <div class="">
                    <hr class="hr" />
                </div>
                <div class="mx-auto d-flex flex-column flex-lg-row align-items-center footer-info-space gap-4">
                    <div class="container pt-5 pb-4">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="col-12 col-lg-3">
                                    <h5 style="color: #FF0000">GET CONNECTED</h5>
                                    <ul class="list-unstyled">
                                        <li><a href="#">Cibubur</a></li>
                                        <li><a href="#">Indonesia</a></li>
                                        <li><a href="#">0822-2222-8888</a></li>
                                        <li><a href="#">Hellokitchen92@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="d-flex title-font font-medium align-items-center gap-4">
                            <a href="">
                                <svg class="social-media-c social-media-left" width="30" height="30" viewBox="0 0 30 30"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="15" cy="15" r="15" fill="#707092" />
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M17.6648 9.65667H19.1254V7.11267C18.8734 7.078 18.0068 7 16.9974 7C14.8914 7 13.4488 8.32467 13.4488 10.7593V13H11.1248V15.844H13.4488V23H16.2981V15.8447H18.5281L18.8821 13.0007H16.2974V11.0413C16.2981 10.2193 16.5194 9.65667 17.6648 9.65667Z"
                                            fill="#141432" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="16" height="16" fill="white" transform="translate(7 7)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="">
                                <svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="15" cy="15" r="15" fill="#707092" />
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M23 10.039C22.405 10.3 21.771 10.473 21.11 10.557C21.79 10.151 22.309 9.513 22.553 8.744C21.919 9.122 21.219 9.389 20.473 9.538C19.871 8.897 19.013 8.5 18.077 8.5C16.261 8.5 14.799 9.974 14.799 11.781C14.799 12.041 14.821 12.291 14.875 12.529C12.148 12.396 9.735 11.089 8.114 9.098C7.831 9.589 7.665 10.151 7.665 10.756C7.665 11.892 8.25 12.899 9.122 13.482C8.595 13.472 8.078 13.319 7.64 13.078C7.64 13.088 7.64 13.101 7.64 13.114C7.64 14.708 8.777 16.032 10.268 16.337C10.001 16.41 9.71 16.445 9.408 16.445C9.198 16.445 8.986 16.433 8.787 16.389C9.212 17.688 10.418 18.643 11.852 18.674C10.736 19.547 9.319 20.073 7.785 20.073C7.516 20.073 7.258 20.061 7 20.028C8.453 20.965 10.175 21.5 12.032 21.5C18.068 21.5 21.368 16.5 21.368 12.166C21.368 12.021 21.363 11.881 21.356 11.742C22.007 11.28 22.554 10.703 23 10.039Z"
                                            fill="#141432" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="16" height="16" fill="white" transform="translate(7 7)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="">
                                <svg class="social-media-p" width="30" height="30" viewBox="0 0 30 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.8711 15C17.8711 16.5857 16.5857 17.8711 15 17.8711C13.4143 17.8711 12.1289 16.5857 12.1289 15C12.1289 13.4143 13.4143 12.1289 15 12.1289C16.5857 12.1289 17.8711 13.4143 17.8711 15Z"
                                        fill="#707092" />
                                    <path
                                        d="M21.7144 9.92039C21.5764 9.5464 21.3562 9.20789 21.0701 8.93002C20.7923 8.64392 20.454 8.42374 20.0797 8.28572C19.7762 8.16785 19.3203 8.02754 18.4805 7.98932C17.5721 7.94789 17.2997 7.93896 14.9999 7.93896C12.6999 7.93896 12.4275 7.94766 11.5193 7.98909C10.6796 8.02754 10.2234 8.16785 9.92014 8.28572C9.54591 8.42374 9.2074 8.64392 8.92976 8.93002C8.64366 9.20789 8.42348 9.54617 8.28523 9.92039C8.16736 10.2239 8.02705 10.6801 7.98883 11.5198C7.9474 12.428 7.93848 12.7004 7.93848 15.0004C7.93848 17.3002 7.9474 17.5726 7.98883 18.481C8.02705 19.3208 8.16736 19.7767 8.28523 20.0802C8.42348 20.4545 8.64343 20.7927 8.92953 21.0706C9.2074 21.3567 9.54568 21.5769 9.91991 21.7149C10.2234 21.833 10.6796 21.9733 11.5193 22.0115C12.4275 22.053 12.6997 22.0617 14.9997 22.0617C17.3 22.0617 17.5723 22.053 18.4803 22.0115C19.3201 21.9733 19.7762 21.833 20.0797 21.7149C20.8309 21.4251 21.4247 20.8314 21.7144 20.0802C21.8323 19.7767 21.9726 19.3208 22.011 18.481C22.0525 17.5726 22.0612 17.3002 22.0612 15.0004C22.0612 12.7004 22.0525 12.428 22.011 11.5198C21.9728 10.6801 21.8325 10.2239 21.7144 9.92039ZM14.9999 19.4231C12.5571 19.4231 10.5768 17.4431 10.5768 15.0002C10.5768 12.5573 12.5571 10.5773 14.9999 10.5773C17.4426 10.5773 19.4229 12.5573 19.4229 15.0002C19.4229 17.4431 17.4426 19.4231 14.9999 19.4231ZM19.5977 11.4361C19.0269 11.4361 18.5641 10.9733 18.5641 10.4024C18.5641 9.83159 19.0269 9.36879 19.5977 9.36879C20.1685 9.36879 20.6313 9.83159 20.6313 10.4024C20.6311 10.9733 20.1685 11.4361 19.5977 11.4361Z"
                                        fill="#707092" />
                                    <path
                                        d="M15 0C6.717 0 0 6.717 0 15C0 23.283 6.717 30 15 30C23.283 30 30 23.283 30 15C30 6.717 23.283 0 15 0ZM23.5613 18.5511C23.5197 19.468 23.3739 20.094 23.161 20.6419C22.7135 21.7989 21.7989 22.7135 20.6419 23.161C20.0942 23.3739 19.468 23.5194 18.5513 23.5613C17.6328 23.6032 17.3394 23.6133 15.0002 23.6133C12.6608 23.6133 12.3676 23.6032 11.4489 23.5613C10.5322 23.5194 9.90601 23.3739 9.35829 23.161C8.78334 22.9447 8.26286 22.6057 7.83257 22.1674C7.39449 21.7374 7.05551 21.2167 6.83922 20.6419C6.62636 20.0942 6.48056 19.468 6.4389 18.5513C6.39656 17.6326 6.38672 17.3392 6.38672 15C6.38672 12.6608 6.39656 12.3674 6.43867 11.4489C6.48033 10.532 6.6259 9.90601 6.83876 9.35806C7.05505 8.78334 7.39426 8.26263 7.83257 7.83257C8.26263 7.39426 8.78334 7.05528 9.35806 6.83899C9.90601 6.62613 10.532 6.48056 11.4489 6.43867C12.3674 6.39679 12.6608 6.38672 15 6.38672C17.3392 6.38672 17.6326 6.39679 18.5511 6.4389C19.468 6.48056 20.094 6.62613 20.6419 6.83876C21.2167 7.05505 21.7374 7.39426 22.1677 7.83257C22.6057 8.26286 22.9449 8.78334 23.161 9.35806C23.3741 9.90601 23.5197 10.532 23.5616 11.4489C23.6034 12.3674 23.6133 12.6608 23.6133 15C23.6133 17.3392 23.6034 17.6326 23.5613 18.5511Z"
                                        fill="#707092" />
                                </svg>
                            </a>
                            <a href="">
                                <svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="15" cy="15" r="15" fill="#707092" />
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M17.9027 22.4467C17.916 22.4427 17.9287 22.4373 17.942 22.4327C26.0853 19.1973 23.8327 7 15 7C10.5673 7 7 10.6133 7 15C7 20.5513 12.6227 24.5127 17.9027 22.4467ZM10.5207 20.3727C11.0887 19.418 12.9267 16.7247 16.064 15.7953C16.72 17.468 17.18 19.4193 17.2253 21.632C14.848 22.4313 12.3407 21.8933 10.5207 20.3727ZM18.2087 21.2147C18.1213 19.0887 17.6873 17.2033 17.0687 15.57C18.4567 15.3533 20.0633 15.498 21.8853 16.228C21.498 18.402 20.108 20.2293 18.2087 21.2147ZM21.99 15.194C19.9833 14.44 18.2147 14.346 16.684 14.638C16.4473 14.1047 16.1987 13.592 15.9353 13.12C18.284 12.182 19.672 11.0387 20.2933 10.4333C21.39 11.7027 22.0413 13.346 21.99 15.194ZM19.5833 9.72133C19.018 10.2593 17.6867 11.346 15.41 12.2347C14.294 10.4693 13.1007 9.224 12.3447 8.52667C14.7633 7.53067 17.5527 7.956 19.5833 9.72133ZM11.3887 9.01533C11.9593 9.51733 13.212 10.7227 14.4207 12.5867C12.7607 13.1213 10.6793 13.514 8.148 13.5693C8.55067 11.64 9.75333 10.0053 11.3887 9.01533ZM8.02133 14.5733C10.8547 14.5273 13.148 14.08 14.9607 13.4747C15.2113 13.914 15.4493 14.3927 15.678 14.89C12.5213 15.8953 10.5487 18.4907 9.79333 19.6627C8.57467 18.3027 7.90267 16.528 8.02133 14.5733Z"
                                            fill="#141432" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="16" height="16" fill="white" transform="translate(7 7)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div> --}}


                </div>
            </div>
        </div>
        <nav class="d-flex flex-lg-row flex-column align-items-center justify-content-center">
            <p style="color:grey">Copyright © 2021 Hello Kitchen</p>
        </nav>
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

@section('fixed', 'd-none')

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
            var idproduct = $('.product-id').val();
            var addtocard = $('.addtocard').val();

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
                alert('salah')
            })
        })
    </script>
@endpush

@push('addon-style')
    <style>
        .categories .row img {
            border-radius: 5px 15px;
        }

        .carousel-inner .carousel-item img {
            object-fit: cover;
        }

        .categories .row .col-md-4 .title-categories {
            position: absolute;
            top: 82%;
            padding-left: 10px;
            font-size: 18px;
            line-height: 30px;
            font-weight: 400;
        }

        .categories .row .col-md-4 .title-text {
            position: absolute;
            top: 90%;
            padding-left: 10px;
            font-size: 14px;
            line-height: 30px;
            font-weight: 400;
        }

        .menus img {
            border-radius: 15px;
        }

        .title-menu {
            font-size: 18px;
        }

        .price-menu {
            position: absolute;
            right: 0;
            font-size: 12px;
            width: 40%;
        }

        .add-to-card {
            background-color: #dae0e5;
            border-color: #dae0e5;
        }

    </style>
@endpush
