<form>
    <div class="form-row align-items-center">
        <div class="col-auto">

            <label for="jabatan" class="sr-only">{{ __('Jabatan') }}</label>
            <select class="form-control  form-control-sm @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
                <option disabled selected>--pilih jabatan--</option>
                @foreach($jabatan as $key => $jbt)
                <option {{ $key == old('jabatan', request('jabatan')  ?? null) ? 'selected' : '' }} value="{{ $key }}">{{ $jbt }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label class="sr-only" for="keyword">keyword</label>
            <input type="text" id="keyword" name="keyword" value="{{ request('keyword') }}" class="form-control form-control-sm" placeholder="Carian Kekunci">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='{{route('home')}}'">Reset</button>
        </div>
    </div>
</form>
