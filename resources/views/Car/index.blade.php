@extends('Layout.app')

@section('content')
    {{--  CRUD CAR  --}}
    <section class="ftco-section bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="h1 text-white">Management Mobil</span>
                    <p class="h3 text-white">Daftar mobil yang tersedia</p>
                </div>
            </div>
            {{--  button tambah  --}}
            <div class="row justify-content-center">
                <div class="col-md-12 text-right">
                    <a href="{{ route('cars.create') }}" class="btn btn-success">
                        <i class="bi bi-plus"></i> Tambah Brand</a>
                    <a href="{{ route('cars.create') }}" class="btn btn-success">
                        <i class="bi bi-plus"></i> Tambah</a>
                </div>
            </div>
            {{--  end button tambah  --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($cars as $car)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url({{ asset('storage/' . $car->image) }});">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">{{ $car->name }}</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">{{ $car->brand }}</span>
                                            <p class="price ml-auto">
                                                Rp. {{ number_format($car->price_day) }} <span>/day</span>
                                            </p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="{{ route('car.show', $car->id) }}"
                                                class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="{{ route('car.show', $car->id) }}"
                                                class="btn btn-secondary py-2 ml-1">Details</a>
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
@endsection
