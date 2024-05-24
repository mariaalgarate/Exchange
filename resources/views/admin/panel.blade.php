@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h1>Panel de Administrador</h1>

    <div class="row mt-4 mb-4">
        <!-- Gestionar Categorías -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-tags"></i> Gestión de Categorías
                </div>
                <div class="card-body">
                    <a href="{{ route('categories/create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>
                    <a href="{{ route('categories/index') }}" class="btn btn-secondary">Ver Todas las Categorías</a>
                </div>
            </div>
        </div>

        <!-- Gestionar Usuarios -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users"></i> Gestión de Usuarios
                </div>
                <div class="card-body">
                    <a href="{{ route('admin/users') }}" class="btn btn-primary">Ver Todos los Usuarios</a>
                    <!-- Puedes agregar más enlaces para otras funciones de usuario -->
                </div>
            </div>
        </div>

        <!-- Otras Funcionalidades -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color:#cdcdcd;">
                    <i class="fas fa-cogs" style="background-color: #686868;"></i> Otras Funcionalidades
                </div>
                <div class="card-body">
                    <!-- Enlaces a otras funciones administrativas -->
                    <a href="#" class="btn btn-secondary px-3" style="background-color: #686868; cursor:auto;">Configuraciones</a>
                    <a href="#" class="btn btn-secondary" style="background-color: #686868; cursor:auto;">Ver Reportes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
