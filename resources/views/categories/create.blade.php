@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Crear Nueva Categoría</h1>

    <form action="{{ route('categories/store') }}" method="POST">
        @csrf
        <div class="form-group mt-5 mb-5">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
