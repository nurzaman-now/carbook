@extends('Layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
@endsection

@section('content')
    {{--  CRUD CAR  --}}
    <section class="ftco-section bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="h1 text-white">Data Pengembalian</span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    {{--  card  --}}
                    <div class="card">
                        <div class="card-body">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mobil</th>
                                        <th>Brand</th>
                                        <th>Plat Nomor</th>
                                        <th>Harga</th>
                                        <th>Tanggal Booking</th>
                                        <th>Tanggal Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentals as $rental)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $rental->car->name }}</td>
                                            <td class="text-center">{{ $rental->car->brand->name }}</td>
                                            <td class="text-center">{{ $rental->car->license_plate }}</td>
                                            <td class="text-center">
                                                RP. {{ number_format($rental->car->price_day, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $rental->rental_date }}</td>
                                            <td class="text-center">{{ $rental->return_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.dataTables.js"></script>
    <script>
        $(document).ready(function() {});
    </script>
@endsection
