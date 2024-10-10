<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
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
    public function handle(Logout $event)
    {
        activity()
            ->useLog('auth') // Especifica el log_name (puede ser el mismo 'auth')
            ->performedOn($event->user) // El "subject" es el usuario que está cerrando sesión
            ->causedBy($event->user) // El "causer" es el usuario que está cerrando sesión
            ->withProperties(['ip' => request()->ip()]) // Agregar más propiedades si lo deseas
            ->event('logout') // Evento de logout
            ->log('Usuario ha cerrado sesión.'); // Mensaje de descripción
    }
}