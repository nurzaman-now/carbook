<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Nama Brand</label>
            <input type="text" name="name"
                class="form-control
                        @error('name')
                            is-invalid
                        @enderror
                        "
                placeholder="Nama Brand" value="{{ old('name', $brand->name ?? '') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-primary py-3 px-4">Simpan</button>
</div>
