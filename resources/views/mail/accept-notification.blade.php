@component('mail::message')
    {{-- Header --}}
    @slot('header')
        <img src="{{ asset('imgs/logo_exchange.png') }}" alt="Logo de la empresa">
    @endslot

    {{-- Body --}}
    # Confirmación de intercambio

    Hola {{ $user->nombre }},

    Enhorabuena, el intercambio del producto "{{ $producto->nombre }}" ha sido aceptado.
    Por favor, dirígete a tu punto de envío más cercano, debes enviar el producto a la siguiente dirección:
    {{ $oppositeUser->calle }}, {{ $oppositeUser->codigo_postal }}, {{ $oppositeUser->ciudad }}, {{ $oppositeUser->pais }}.

    Gracias,
    Exchange

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        @endcomponent
    @endslot
@endcomponent
