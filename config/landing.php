<?php

/**
 * Datos de contacto del landing (citas vía WhatsApp, sin backend de reservas).
 */
$phone = '524776729792'; // +52 477 672 9792 (México)
$defaultMessage = 'Hola, quiero reservar una cita en Prime Dental.';

return [
    'whatsapp_phone_e164' => $phone,
    'whatsapp_default_message' => $defaultMessage,
    'whatsapp_reservation_url' => 'https://wa.me/'.$phone.'?text='.rawurlencode($defaultMessage),
    'contact_email' => 'angelgutierrez.yuki@gmail.com',
    'phone_display' => '+52 477 672 9792',
    'phone_tel_href' => 'tel:+524776729792',
];
