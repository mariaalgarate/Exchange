@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Gestión de Usuarios</h1>

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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if(!$usuario->admin)
                            <form action="{{ route('admin/make-admin', $usuario->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Hacer Administrador</button>
                            </form>
                        @else
                            <span class="badge bg-success">Administrador</span>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    
    <form action="{{ route('admin/create') }}" method="GET" style="display: inline-block;">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">Crear Administrador</button>
    </form>
</div>
@endsection
