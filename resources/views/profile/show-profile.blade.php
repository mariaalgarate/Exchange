@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil de Usuario') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if(auth()->user()->imagen)
                            <!-- Mostrar la imagen subida por el usuario -->
                            <img src="{{ asset('storage/' . auth()->user()->imagen) }}" alt="{{ auth()->user()->nombre }}" class="img-fluid mb-3">
                        @else
                            <!-- Mostrar una imagen predeterminada si el usuario no tiene una -->
                            <img src="{{ asset('../imgs/avatar.png') }}" alt="Avatar predeterminado" class="img-fluid mb-3">
                        @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</h3>
                            <p><strong>Nombre de usuario:</strong> {{ auth()->user()->nombre_usuario }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Teléfono:</strong> {{ auth()->user()->telefono }}</p>
                            <p><strong>Ciudad:</strong> {{ auth()->user()->ciudad }}</p>
                            <p><strong>País:</strong> {{ auth()->user()->pais }}</p>
                            <p><strong>Calle:</strong> {{ auth()->user()->calle }}</p>
                            <p><strong>Código Postal:</strong> {{ auth()->user()->codigo_postal }}</p>
                            <a href="{{ route('edit-user') }}" class="btn btn-primary">Editar Perfil</a>
                            <a href="{{ route('delete-user') }}" class="btn btn-primary">Darse de baja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
