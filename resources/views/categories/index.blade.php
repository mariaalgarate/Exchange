@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Lista de Categorías</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories/create') }}" class="btn btn-primary mt-2 mb-2">Crear Nueva Categoría</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('categories/edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categories/destroy', $categoria->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
