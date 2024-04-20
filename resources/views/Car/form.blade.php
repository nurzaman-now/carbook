<div class="row mt-2">
    {{--  show image  --}}
    <div class="col-md-12">
        @if (isset($car) && $car->image)
            <img src="{{ asset('storage/cars/' . $car->image) }}" alt="{{ $car->name }}" class="img-thumbnail">
        @else
            <img src="" alt="..." class="img-thumbnail">
        @endif
    </div>

    <div class="col-md-12">
        {{--  image  --}}
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image"
                class="form-control
                        @error('image')
                            is-invalid
                        @enderror
                        "
                placeholder="Gambar" value="{{ old('image', $car->image ?? '') }}">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name"
                class="form-control
                        @error('name')
                            is-invalid
                        @enderror
                        "
                placeholder="Nama" value="{{ old('name', $car->name ?? '') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand_id">Brand</label>
            <select name="brand_id"
                class="form-control
                        @error('brand_id')
                            is-invalid
                        @enderror
                        ">
                <option value="">Pilih Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ old('brand_id', $car->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{--  model  --}}
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model"
                class="form-control
                        @error('model')
                            is-invalid
                        @enderror
                        "
                placeholder="Model" value="{{ old('model', $car->model ?? '') }}">
            @error('model')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="license_plate">Plat Nomor</label>
            <input type="text" name="license_plate"
                class="form-control
                        @error('license_plate')
                            is-invalid
                        @enderror
                        "
                placeholder="Plat Nomor" value="{{ old('license_plate', $car->license_plate ?? '') }}">
            @error('license_plate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{--  price day  --}}
        <div class="form-group">
            <label for="price_day">Harga Perhari</label>
            {{--  add RP in before  --}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Rp. </div>
                </div>
                <input type="text" name="price_day"
                    class="form-control
                            @error('price_day')
                                is-invalid
                            @enderror
                            "
                    placeholder="Harga Perhari" value="{{ old('price_day', $car->price_day ?? '') }}">
            </div>
            @error('price_day')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-primary py-3 px-4">Simpan</button>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            $('input[name="image"]').on('change', function() {
                const file = $(this).get(0).files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        $('.img-thumbnail').attr('src', reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
