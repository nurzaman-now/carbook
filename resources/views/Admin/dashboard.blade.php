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

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Apa yang kita tawarkan</span>
                    <h2 class="mb-2">Kendaraan Unggulan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($carsBrand as $car)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url(storage/cars/{{ $car->image ?? '' }});">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">{{ $car->name ?? '' }}</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">{{ $car->brand->name ?? '' }}
                                                <br>{{ $car->model ?? '' }}</span>
                                            <p class="price ml-auto">
                                                Rp. {{ number_format($car->price_day, 0, ',', '.') }}
                                                <span>/Hari</span>
                                            </p>
                                        </div>
                                        <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary w-100">Book
                                                now</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url(images/about.jpg);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">About us</span>
                        <h2 class="mb-4">Welcome to Carbook</h2>

                        <p>
                            Aplikasi Penyedia Sewa Mobil adalah platform yang
                            memungkinkan pengguna untuk mencari, memesan, dan mengelola
                            penyewaan mobil secara online.</p>
                        <p>
                            Aplikasi ini memungkinkan pengguna untuk mencari mobil
                            yang sesuai dengan kebutuhan mereka, memesan mobil tersebut
                            secara online, dan mengelola penyewaan mobil mereka.
                        </p>
                        <p>
                            Aplikasi ini juga memungkinkan pengguna untuk melihat
                            informasi tentang mobil yang mereka sewa, termasuk harga,
                            deskripsi, dan foto mobil tersebut.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="{{ $totalCar }}">0</strong>
                            <span>Total <br>Cars</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="{{ $totalBrand }}">0</strong>
                            <span>Total <br>Branches</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
