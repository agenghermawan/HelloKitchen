@extends('frontend.include.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <!-- Page Content -->
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <form action="{{ route('checkoutdata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="store-cart">
                <div class="container">
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-12 table-responsive">
                            <table class="table table-borderless table-cart responsive" aria-describedby="Cart">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name &amp; Seller</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalPrice = 0 @endphp
                                    @forelse ($carts as $cart)
                                        <tr>
                                            <td style="width: 20%;">
                                                @if ($cart->product->galleries)
                                                    <img src="{{ Storage::url($cart->product->galleries->first()->Photos) }}"
                                                        alt="" class="cart-image" />
                                                @endif
                                            </td>
                                            <td style="width: 35%;">
                                                <div class="product-title">{{ $cart->product->ProductName }}</div>
                                            </td>
                                            <td style="width: 20%">
                                                <div class="product-title">Rp {{ number_format($cart->product->Price) }}
                                                </div>
                                            </td>
                                            <td style="width: 20%;">
                                                <input type="number" name="Quantity" style="width: 100px" min="0" required
                                                    class="form-control mt-3" placeholder="" required>
                                            </td>
                                            <td style="width: 35%;">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <button class="btn btn-remove-cart deleterecord" type="button"
                                                    data-id="{{ $cart->id }}">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                        @php $totalPrice += $cart->product->Price @endphp
                                    @empty
                                        <p class="text-center my-5"> Keranjang anda masih kosong , Silahkan memilih makanan
                                            yang ingin anda beli </p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-4">Shipping Details</h2>
                        </div>
                    </div>

                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Name </label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }} "
                                    required />
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="address_one"> Email </label>
                                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <input type="text" class="form-control" name="address_one" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input type="text" class="form-control" id="address_two" name="address_two" placeholder=""
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <select name="province" id="province" class="form-control">
                                    <option> == Choose Destination == </option>
                                    <option> Jawa Barat (Depok) </option>
                                    <option> Jakarta Selatan </option>
                                    <option> Jakarta Timur </option>
                                    <option> Jakarta Utara </option>
                                    <option> Jakarta Barat </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="courier">Courir</label>
                                <select name="courier" id="courier" class="form-control">
                                    <option value="JNE"> JNE</option>
                                    <option value="GOSEND"> GOSEND </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes_address">Notes Address</label>
                                <textarea name="notes_address" id="notes_address" class="form-control" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Phone</label>
                                <input type="text" class="form-control" id="phone_number" name="phone" required />
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                Checkout Now
                            </button>
                        </div>
                        <hr />
                    </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(".deleterecord").click(function() {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "cart/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function() {
                    console.log("it Works");
                }
            });
            location.reload(true);
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            //active select2
            $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
                theme: 'bootstrap4',
                width: 'style',
            });
            //ajax select kota asal
            $('select[name="province_origin"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="city_origin"]').empty();
                            $('select[name="city_origin"]').append(
                                '<option value="">-- pilih kota asal --</option>');
                            $.each(response, function(key, value) {
                                $('select[name="city_origin"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').append(
                        '<option value="">-- pilih kota asal --</option>');
                }
            });
            //ajax select kota tujuan
            $('select[name="province_destination"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="city_destination"]').empty();
                            $('select[name="city_destination"]').append(
                                '<option value="">-- pilih kota tujuan --</option>');
                            $.each(response, function(key, value) {
                                $('select[name="city_destination"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').append(
                        '<option value="">-- pilih kota tujuan --</option>');
                }
            });
            //ajax check ongkir
            let isProcessing = false;
            $('.btn-check').click(function(e) {
                e.preventDefault();

                let token = $("meta[name='csrf-token']").attr("content");
                let city_origin = $('select[name=city_origin]').val();
                let city_destination = $('select[name=city_destination]').val();
                let courier = $('select[name=courier]').val();
                let weight = $('#weight').val();

                if (isProcessing) {
                    return;
                }

                isProcessing = true;
                jQuery.ajax({
                    url: "/ongkir",
                    data: {
                        _token: token,
                        city_origin: city_origin,
                        city_destination: city_destination,
                        courier: courier,
                        weight: weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    success: function(response) {
                        isProcessing = false;
                        if (response) {
                            $('#ongkir').empty();
                            $('.ongkir').addClass('d-block');
                            $.each(response[0]['costs'], function(key, value) {
                                $('#ongkir').append('<li class="list-group-item">' +
                                    response[0].code.toUpperCase() + ' : <strong>' +
                                    value.service + '</strong> - Rp. ' + value.cost[
                                        0].value + ' (' + value.cost[0].etd +
                                    ' hari)</li>')
                            });

                        }
                    }
                });

            });

        });
    </script> --}}
@endsection
