@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ __('Bienvenido de nuevo') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="mb-5">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link text-muted text-decoration-none col-md-11" style="font-size:13px;" href="{{ route('password.request') }}">
                                        {{ __('¿Has olvidado tu contraseña?') }}
                                    </a>
                                @endif
                        </div>

                        
                        <div class="row mb-0">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            
                               
                            </div>
                            
                        </div>
                        <p class="font-weight-bold text-center text-muted">O inicia sesión con</p>
                    <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-sin-funcionamiento flex-grow-1" style="margin-right: 10px; cursor: auto;
                    color: #333; background-color: #666;"><i class="fa-brands fa-google lead mr-2"></i> Google</button>
                    <button type="submit" class="btn btn-sin-funcionamiento flex-grow-1" style="margin-left: 10px; cursor: auto;
                    color: #333; background-color: #666;"><i class="fa-brands fa-facebook-f lead mr-2"></i> Facebook</button>
                </div>
                    </form>
                    
                </div>

                <div class="text-center px-lg-5 ot-kg-3 pb-lg-4 p-4">
                    <p class="d-inline-block mb-0" style="font-size:15px;"> ¿Todavía no tienes una cuenta? </p>
                    <a href="{{ route('register') }}" class="text-decoration-none font-weight-bold"> Crea una ahora</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

