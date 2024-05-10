@extends('layouts.app')
    @section('content')
        <div class="container my-5 d-flex flex-column justify-content-center align-items-center">
            <img width="800" src="../imgs/404.png" alt="error 404">
            <h1 class="fw-semibold">Página no encontrada</h1>
            <h4 class="mb-4">Lo sentimos, la página que buscas no existe</h4>
            <a href="{{route('inicio')}}" type="button" class="btn btn-primary">Volver a home</a>
        </div>
    @endsection