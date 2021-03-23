<div class="form-group">
    <label for="name">{{ __('Nama User') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $user->name ?? null) }}">

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="email">{{ __('Email User') }}</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
        value="{{ old('email', $user->email ?? null) }}">

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
    </div>
</div>
