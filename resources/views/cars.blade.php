@extends('Layout.app')

@section('content')
    <section class="ftco-section ftco-no-pt bg-dark">
    </section>
    <section class="ftco-section bg-light mt-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <h2 class="mb-2">Pilih Kendaraan Anda</h2>
                    {{--  input query  --}}
                </div>
            </div>
            <form action="{{ route('cars') }}" method="GET">
                <div class="row text-center justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            {{--  input query append button search  --}}
                            <div class="input-group-append">
                                <input type="text" name="q" class="form-control" placeholder="Cari Kendaraan"
                                    value="{{ $q }}">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    {{--  foreach cars menggunakan card  --}}
                    <div class="row">
                        @foreach ($cars as $car)
                            {{--  card  --}}
                            @if ($car->available)
                                <div class="col-md-4 ftco-animate">
                                    <div class="card">
                                        <img src="{{ asset('storage/cars/' . $car->image) }}" class="card-img-top"
                                            alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $car->name }}</h5>
                                            <p class="card-text">{{ $car->brand->name }} - {{ $car->model }}</p>
                                            <p class="card-text">Rp. {{ number_format($car->price_day, 0, ',', '.') }} /
                                                Hari
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('booking.booking', $car->id) }}"
                                                class="btn btn-primary w-100">Pesan
                                                Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{--  pagination  --}}
                    @if ($cars->lastPage() > 1)
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $cars->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cars->url(1) }}">First</a>
                            </li>
                            @for ($i = 1; $i <= $cars->lastPage(); $i++)
                                <li class="page-item {{ $cars->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $cars->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $cars->currentPage() == $cars->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cars->url($cars->lastPage()) }}">Last</a>
                            </li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
