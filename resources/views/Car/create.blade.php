@extends('Layout.app')

@section('content')
    {{--  CRUD CAR  --}}
    <section class="ftco-section bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="h1 text-white">Management Mobil</span>
                    <p class="h3 text-white">Membuat mobil</p>
                </div>
            </div>
            {{--  button tambah  --}}
            <div class="row justify-content-center">
                <div class="col-md-12 text-right">
                    <a href="{{ route('cars.index') }}" class="btn btn-success">
                        <i class="bi bi-arrow-left"></i> Kembali</a>
                </div>
            </div>
            {{--  end button tambah  --}}
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </section>
@endsection
