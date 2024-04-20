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
                    <form action="{{ route('booking.storeBooking', $car->id) }}" method="POST"
                        enctype="multipart/form-data" class="billing-form ftco-animate">
                        @csrf
                        {{--  rental_date  --}}
                        <div class="form-group">
                            <label for="rental_date">Tanggal Sewa</label>
                            <input type="date" name="rental_date" id="rental_date" class="form-control"
                                value="{{ old('rental_date') }}">
                        </div>
                        {{--  return_date  --}}
                        <div class="form-group">
                            <label for="return_date">Tanggal Kembali</label>
                            <input type="date" name="return_date" id="return_date" class="form-control"
                                value="{{ old('return_date') }}">
                        </div>
                        {{--  total  --}}
                        <div class="form-group">
                            <label for="total">Total</label>
                            {{--  add Rp.  --}}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" name="total" id="total" class="form-control"
                                    value="{{ old('total') }}" readonly>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--  js total by date   --}}
@section('js')
    <script>
        $(document).ready(function() {
            $('#rental_date, #return_date').change(function() {
                var price_day = {{ $car->price_day }};
                var rental_date = $('#rental_date').val();
                var return_date = $('#return_date').val();
                var total = 0;
                if (rental_date && return_date) {
                    var date1 = new Date(rental_date);
                    var date2 = new Date(return_date);
                    var diffTime = Math.abs(date2 - date1);
                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                    total = diffDays * price_day;
                }
                $('#total').val(total);
            });
        });
    </script>
@endsection
