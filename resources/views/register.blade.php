@extends('Layout.app')

@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Cara Cepat & Mudah Untuk Menyewa Mobil</h1>
                        <p style="font-size: 18px;">
                            <a href="#" class="btn btn-success py-2 px-4">Sewa Mobil Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  section form register --}}
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Sewa Mobil</span>
                    <h2 class="mb-2">Sewa Mobil Sekarang</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{ route('register') }}" method="POST" class="billing-form ftco-animate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name"
                                        class="form-control
                                    @error('name')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Nama">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control
                                    @error('email')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">
                                        <i>Email akan digunakan sebagai username</i>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="3"
                                        class="form-control
                                    @error('address')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Alamat"></textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{--  phone_number  --}}
                                <div class="form-group">
                                    <label for="phone_number">Nomor Telepon</label>
                                    <input type="text" name="phone_number"
                                        class="form-control
                                    @error('phone_number')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Nomor Telepon">
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{--  SIM_number  --}}
                                <div class="form-group">
                                    <label for="SIM_number">Nomor SIM</label>
                                    <input type="text" name="SIM_number"
                                        class="form-control
                                    @error('SIM_number')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Nomor SIM">
                                    @error('SIM_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    {{--  add toogle eye  --}}
                                    <div class="input-group">
                                        <input type="password" name="password"
                                            class="form-control
                                        @error('password')
                                            is-invalid
                                        @enderror
                                        "
                                            placeholder="Password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="bi bi-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <small class="text-muted">
                                        <i>Password minimal 8 karakter</i>
                                    </small>
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        {{--  add toggle eye --}}
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation"
                                                class="form-control
                                            @error('password_confirmation')
                                                is-invalid
                                            @enderror
                                            "
                                                placeholder="Konfirmasi Password">
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="bi bi-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <a href="{{ route('login') }}" class="btn btn-outline-info btn-block">
                                Sudah punya akun? Masuk
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // toggle eye password
            $('.input-group-append').on('click', function() {
                let input = $(this).parent().find('input');
                let icon = $(this).find('i');

                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('bi-eye-slash');
                    icon.addClass('bi-eye');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('bi-eye');
                    icon.addClass('bi-eye-slash');
                }
            });
        });
    </script>
@endsection
