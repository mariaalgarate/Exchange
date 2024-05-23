@component('mail::message')
    {{-- Header --}}
    @slot('header')
        <img src="{{ asset('imgs/logo_exchange.png') }}" alt="Logo de la empresa">
    @endslot

    {{-- Body --}}
    # Alguien está interesado en tu producto

    Hola {{ $destinatario->nombre }},
    Alguien está interesado en intercambiar el producto "{{ $producto->nombre }}" contigo.
    Por favor, revisa la aplicación para más detalles.
    Gracias,
    Exchange

    @component('mail::button', ['url' => route('show', ['id' => $producto->id])])
        Ver Producto
    @endcomponent

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Exchange. Todos los derechos reservados.
        @endcomponent
    @endslot
@endcomponent
