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

    <div style="margin-top: 20px;">
        <a href="{{ route('show', ['id' => $producto->id]) }}" style="background-color: #ff7b00; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Ver Producto</a>
    </div>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Exchange. Todos los derechos reservados.
        @endcomponent
    @endslot
@endcomponent
