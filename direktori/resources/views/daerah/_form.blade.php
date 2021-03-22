<div class="form-group">
    <label for="nama">{{ __('Nama Daerah') }}</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $daerah->nama ?? null) }}">

    @error('nama')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
