@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
        @csrf
        <div class="form-group">
            <label for="email"> Email </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"> Password </label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            @error('password')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                {{ __('Login') }}
            </button>
        </div>
    </form>
@endsection
