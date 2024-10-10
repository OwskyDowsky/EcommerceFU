<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Spatie\Activitylog\Traits\LogsActivity;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        activity()
            ->useLog('auth') // Especifica el log_name que deseas
            ->performedOn($event->user) // Especifica el "subject" del evento (puede ser el modelo del usuario u otro recurso)
            ->causedBy($event->user) // Usuario que inició sesión
            ->withProperties(['ip' => request()->ip()]) // Puedes agregar más propiedades si lo deseas
            ->event('login') // Especifica el tipo de evento (login en este caso)
            ->log('Usuario ha iniciado sesión.'); // Mensaje de descripción
    }
}