@extends('frontend.include.app')

@section('content')
    <div class="page-content page-auth mt-5" id="register" style="padding-top:50px">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <form method="POST" action="{{ route('updateProfile', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h2 class="text-center">
                                Perbarui Profile anda <br />
                                Memudahkan dalam berbelanja
                            </h2>
                            <div class="form-group mt-3">
                                <div class="image-upload text-center">
                                    @if (Auth::user()->avatar == null)
                                        <label for="avatar" style="cursor: pointer">
                                            <svg width="120" height="120" viewBox="0 0 120 120" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="60" cy="60" r="60" fill="#E7EAF5" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M60 52.5C57.0641 52.5 54.6239 54.2954 53.7502 56.711C53.559 57.2397 53.0883 57.617 52.5307 57.6886C49.915 58.0244 48 60.135 48 62.5714C48 65.2253 50.2807 67.5 53.25 67.5C54.0784 67.5 54.75 68.1716 54.75 69C54.75 69.8284 54.0784 70.5 53.25 70.5C48.7635 70.5 45 67.0184 45 62.5714C45 58.7996 47.7137 55.7171 51.2715 54.8729C52.7994 51.6764 56.1564 49.5 60 49.5C64.7615 49.5 68.8073 52.8602 69.4965 57.3516C72.5948 57.9685 75 60.5965 75 63.8571C75 67.594 71.841 70.5 68.1 70.5C67.2716 70.5 66.6 69.8284 66.6 69C66.6 68.1716 67.2716 67.5 68.1 67.5C70.3237 67.5 72 65.8009 72 63.8571C72 61.9134 70.3237 60.2143 68.1 60.2143C67.2716 60.2143 66.6 59.5427 66.6 58.7143C66.6 55.3504 63.7149 52.5 60 52.5Z"
                                                    fill="#0C145A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M60 70.5C59.1716 70.5 58.5 69.8284 58.5 69V60C58.5 59.1716 59.1716 58.5 60 58.5C60.8284 58.5 61.5 59.1716 61.5 60V69C61.5 69.8284 60.8284 70.5 60 70.5Z"
                                                    fill="#0C145A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M55.9393 64.0607C55.3536 63.4749 55.3536 62.5251 55.9393 61.9393L58.9393 58.9393C59.5251 58.3536 60.4749 58.3536 61.0607 58.9393C61.6464 59.5251 61.6464 60.4749 61.0607 61.0607L58.0607 64.0607C57.4749 64.6464 56.5251 64.6464 55.9393 64.0607Z"
                                                    fill="#0C145A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M58.9393 58.9393C59.5251 58.3536 60.4749 58.3536 61.0607 58.9393L64.0607 61.9393C64.6464 62.5251 64.6464 63.4749 64.0607 64.0607C63.4749 64.6464 62.5251 64.6464 61.9393 64.0607L58.9393 61.0607C58.3536 60.4749 58.3536 59.5251 58.9393 58.9393Z"
                                                    fill="#0C145A" />
                                            </svg>
                                        </label>
                                    @else
                                        <img src="{{ Storage::url(Auth::user()->avatar) }}" width="120px"
                                            class="rounded-circle" height="120px" alt="">
                                    @endif
                                    <input id="buktiPembayaran" type="file" name="avatar"
                                        accept="image/png, image/jpeg" />
                                    <img src="" id="perview" alt="" class="img-fluid shadow my-3"
                                        style="border-radius: 10px 20px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $data->name }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $data->email }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Telp</label>
                                <input id="telp" type="text"
                                    class="form-control @error('telp') is-invalid @enderror" name="telp"
                                    value="{{ $data->telp }}" autocomplete="telp">

                                @error('telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (Auth::user()->password != null)
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input id="old_password" type="password" class="form-control" name="old_password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password"> New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="new_password">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm"> Confirm Password</label>
                                    <input id="password_confirm" type="password" class="form-control"
                                        name="password_confirm" autocomplete="password_confirm">
                                    @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="new_password"> New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="new_password">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm"> Confirm Password</label>
                                    <input id="password_confirm" type="password" class="form-control"
                                        name="password_confirm" autocomplete="password_confirm">
                                    @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success btn-block mt-4">
                                Update Profile
                            </button>
                        </form>
                        <a class="btn btn-signup btn-block mt-2">
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('addon-script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#perview').attr('src', e.target.result);
                    $('#perview').attr('width', '100%');
                    $('#perview').attr('height', '100%');
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        $('#buktiPembayaran').change(function() {
            readURL(this)
        })
    </script>
@endpush
