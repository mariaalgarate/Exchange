@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Crear Nuevo Administrador</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="nombre_usuario" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" required>
        </div>
        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" class="form-control" name="pais" required>
        </div>
        <div class="form-group">
            <label for="calle">Calle:</label>
            <input type="text" class="form-control" name="calle" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" class="form-control" name="codigo_postal" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen (opcional):</label>
            <input type="file" class="form-control" name="imagen">
        </div>
        <div class="form-group">
            <label para="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label para="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Crear Administrador</button>
    </form>
</div>
@endsection
