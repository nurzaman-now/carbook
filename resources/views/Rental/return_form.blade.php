@extends('Layout.app')

@section('content')
    {{ $errors }}
    {{--  CRUD CAR  --}}
    <section class="ftco-section bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="h1 text-white">Booking Mobil</span>
                    <p class="h3 text-white">Sewa dengan mudah</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('storage/cars/' . $car->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            <p class="card-text">{{ $car->brand->name }} - {{ $car->model }}</p>
                            <p class="card-text">Rp. {{ number_format($car->price_day, 0, ',', '.') }} / Hari</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal Disewa {{ $rental->rental_date }}</h5>
                            <p class="card-text">Tanggal pengembalian {{ $rental->return_date }}</p>
                            <p class="card-text">
                                Total Biaya Sewa Rp. {{ number_format($rental->total_price, 0, ',', '.') }}</p>
                        </div>
                        {{--  footer  --}}
                        <div class="card-footer">
                            <form action="{{ route('booking.returnPost', $rental->car->license_plate) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Kembalikan Mobil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
