<x-card cardTitle="Permisos del rol: {{$role->name}}" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('roles') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>

    <div class="col-md-12 mx-auto">
        <div class="card-body">
            <label>Lista de permisos</label>
            <div class="form-check">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    id="selectAll"
                    onclick="toggleSelectAll(this)"
                >
                <label class="form-check-label" for="selectAll">
                    Seleccionar todos
                </label>
            </div>
            <br>
            <form wire:submit.prevent="updatePermissions">
                @php
                    // Agrupar permisos por entidad
                    $groupedPermissions = $permissions->groupBy(function($permission) {
                        return explode(' ', $permission->name)[0]; // Primer parte del nombre del permiso
                    });
                @endphp

                @foreach($groupedPermissions as $entity => $perms)
                    <div class="mb-4">
                        <div class="form-check">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                id="selectSection{{ $entity }}"
                                onclick="toggleSection(this, '{{ $entity }}')"
                            >
                            <h5 class="form-check-label" for="selectSection{{ $entity }}">
                                {{ $entity }}
                            </h5>
                        </div>
                        <div class="row">
                            @foreach($perms as $permission)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input 
                                            type="checkbox" 
                                            class="form-check-input permission-checkbox" 
                                            wire:model="selectedPermissions" 
                                            value="{{ $permission->id }}"
                                            id="permiso{{ $permission->id }}"
                                            data-section="{{ $entity }}"
                                        >
                                        <label class="form-check-label" for="permiso{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <hr>
                <button type="submit" class="btn btn-success float-right">Actualizar Permisos</button>
            </form>
        </div>
    </div>
</x-card>

<script>
    function toggleSelectAll(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('input[type="checkbox"].permission-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
            checkbox.dispatchEvent(new Event('change')); // Dispatch change event to update Livewire
        });
    }

    function toggleSection(sectionCheckbox, sectionName) {
        const checkboxes = document.querySelectorAll(`input[type="checkbox"][data-section="${sectionName}"]`);
        checkboxes.forEach(checkbox => {
            checkbox.checked = sectionCheckbox.checked;
            checkbox.dispatchEvent(new Event('change')); // Dispatch change event to update Livewire
        });
    }
</script>
