@component('mail::message')
    {{-- Header --}}
    @slot('header')
        <img src="../imgs/logo_exchange.png" alt="Logo de la empresa">
    @endslot

    {{-- Body --}}
    # Rechazo de intercambio
    Hola {{ $user->nombre }},
    Lamentablemente, el intercambio del producto "{{ $producto->nombre }}" ha sido rechazado.
    Por favor, revisa la aplicación para más detalles.
    Gracias,
    Exchange

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Exchange. Todos los derechos reservados.
        @endcomponent
    @endslot
@endcomponent
