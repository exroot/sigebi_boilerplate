@extends('layouts.app')

@section('title', 'SIGEBI | Log In')

@section('content')
<div class="container">
    <h2 class="row justify-content-center mt-4" id="title">Log In</h2>
    <div class="row justify-content-center" id="auth">
        <div class="ml-auto mr-auto mt-5" id="card-container">
            <div class="card card-login shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-4 mb-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12" >
                                    {{ __('Log In') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mt-1 d-flex justify-content-between">
                                <div>
                                    @if (Route::has('password.request'))
                                        <p>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        </p>
                                    @endif
                                </div>
                                <div>
                                    <p>Not register yet?
                                        <a class="btn btn-link" href="/register">
                                            Register
                                        </a>
                                    <p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
