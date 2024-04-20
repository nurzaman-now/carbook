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

    {{--  section form login --}}
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Login</span>
                    <h2 class="mb-2">Silahkan Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('login') }}" method="POST" class="billing-form ftco-animate">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
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
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
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
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-4">Login</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
