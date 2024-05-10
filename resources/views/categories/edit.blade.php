@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Editar Categoría</h1>

    <form action="{{ route('categories/update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-5">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-5">Actualizar</button>
    </form>
</div>
@endsection
