@php
    $message = $whatsappMessage ?? config('landing.whatsapp_default_message');
    $href = 'https://wa.me/'.config('landing.whatsapp_phone_e164').'?text='.rawurlencode($message);
@endphp
<a href="{{ $href }}" target="_blank" rel="noopener noreferrer" class="{{ $class ?? '' }}">{{ $label ?? 'Reservar cita' }}</a>
