@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eliminar Cuenta') }}</div>

                <div class="card-body">
                    <p>ATENCIÓN: ¿Está seguro de que desea eliminar su cuenta? Esta acción es irreversible y eliminará todos sus datos de forma permanente.</p>
                    <form method="POST" action="{{ route('delete-user') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
