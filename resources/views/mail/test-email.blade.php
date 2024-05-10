@component('mail::message')
# Alguien está interesado en tu producto

Hola {{ $vendedor->nombre }},

El usuario {{ $interesado->nombre }} está interesado en intercambiar el producto "{{ $producto->nombre }}" contigo.

Por favor, revisa la aplicación para más detalles.

Gracias,
{{ config('app.name') }}
@endcomponent
