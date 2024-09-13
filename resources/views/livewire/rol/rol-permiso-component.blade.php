<x-card cardTitle="Permisos del rol: {{$role->name}}" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('roles') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>

    <div class="col-md-12 mx-auto">
        <div class="card-body">
            <form wire:submit.prevent="updatePermissions">
                <div class="col-md-12">
                    <label>Lista de permisos</label>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input" 
                                        wire:model="selectedPermissions" 
                                        value="{{ $permission->id }}"
                                        id="permiso{{ $permission->id }}"
                                    >
                                    <label class="form-check-label" for="permiso{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-success float-right">Actualizar Permisos</button>
            </form>
        </div>
    </div>
</x-card>
