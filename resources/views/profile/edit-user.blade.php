@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route ('updateProfile')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label">{{ __('Nombre de Usuario') }}</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="{{ auth()->user()->nombre_usuario }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ auth()->user()->apellido }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                            <input type="telefono" class="form-control" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
                            <input type="ciudad" class="form-control" id="ciudad" name="ciudad" value="{{ auth()->user()->ciudad }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pais" class="form-label">{{ __('Pais') }}</label>
                            <input type="pais" class="form-control" id="pais" name="pais" value="{{ auth()->user()->pais }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="calle" class="form-label">{{ __('Calle') }}</label>
                            <input type="calle" class="form-control" id="calle" name="calle" value="{{ auth()->user()->calle }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="codigo_postal" class="form-label">{{ __('Código postal') }}</label>
                            <input type="codigo_postal" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ auth()->user()->codigo_postal }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">{{ __('Imagen') }}</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{ auth()->user()->imagen }}">
                        </div>

                        <!-- Agrega aquí los demás campos del formulario -->
                        <input type="submit" name="submit" class="btn btn-primary" value="Guardar Cambios">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link text-muted text-decoration-none col-md-11" style="font-size:13px;" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
