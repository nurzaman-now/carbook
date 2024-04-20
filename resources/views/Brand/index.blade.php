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
                    <span class="h1 text-white">Management Mobil</span>
                    <p class="h3 text-white">Brand Mobil</p>
                </div>
            </div>
            {{--  button tambah  --}}
            <div class="row justify-content-center">
                <div class="col-md-12 text-right">
                    <a href="{{ route('brands.create') }}" class="btn btn-success">
                        <i class="bi bi-plus"></i> Tambah</a>
                </div>
            </div>
            {{--  end button tambah  --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    {{--  card  --}}
                    <div class="card">
                        <div class="card-body">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $brand->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning">
                                                    <i class="bi bi-pencil"></i> Edit</a>
                                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i> Delete</button>
                                                </form>
                                            </td>
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
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection
