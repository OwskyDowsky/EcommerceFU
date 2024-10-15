<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

//use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }
    protected function imagen(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->image ? Storage::url('public/' . $this->image->url) : asset
                ('no-image.png');
            }
        );
    }

    protected static $logAttributes = ['name', 'email', 'password', 'apellido_paterno', 'estado', 'ci'];
    protected static $logName = 'usuarios';
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'password', 'apellido_paterno', 'estado', 'ci'])
            ->useLogName('usuarios')
            ->logOnlyDirty();
    }
    public function role()
    {
        return $this->belongsTo(Role::class); 
    }

    // Método para personalizar los nombres de eventos
    public function tapActivity(Activity $activity, string $eventName)
    {
        // Traduce las claves 'attributes' y 'old' a 'atributos' y 'anterior'
        $properties = $activity->properties->toArray();

        if (isset($properties['attributes'])) {
            $properties['atributos'] = $properties['attributes']; // Traduce 'attributes' a 'atributos'
            unset($properties['attributes']);
        }

        if (isset($properties['old'])) {
            $properties['anterior'] = $properties['old']; // Traduce 'old' a 'anterior'
            unset($properties['old']);
        }

        // Reemplaza las propiedades modificadas
        $activity->properties = collect($properties);
        
        // Obtén las propiedades cambiadas
        $changes = $activity->properties['atributos'] ?? [];

        if (array_key_exists('estado', $changes) && count($changes) == 1) {
            // Solo se cambió el estado
            if ($changes['estado'] === 'activo') {
                $activity->description = 'Usuario activado';
            } elseif ($changes['estado'] === 'inactivo') {
                $activity->description = 'Usuario desactivado';
            }
        } else {
            // Si no es un cambio de estado, maneja los eventos normalmente
            switch ($eventName) {
                case 'created':
                    $activity->description = 'Usuario creado';
                    break;
                case 'updated':
                    $activity->description = 'Usuario actualizado';
                    break;
                case 'deleted':
                    $activity->description = 'Usuario eliminado';
                    break;
            }
        }
    }
}
