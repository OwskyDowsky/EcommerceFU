<x-modal modalId="modalClientes" modalTitle="Clientes">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">
            {{-- nombre --}}
            <div class="form-group col-md-4">
                <label class="fas fa-file-signature" for="nombre"> Nombre:</label>
                <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre del cliente"
                    id="nombre">
                @error('nombre')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- apellido paterno --}}
            <div class="form-group col-md-4">
                <label class="fas fa-file-signature" for="apellido"> Apellido Paterno:</label>
                <input wire:model='apellido' type="text" class="form-control"
                    placeholder="Apellido del cliente" id="apellido">
                @error('apellido')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- cod estudiante --}}
            <div class="form-group col-md-4">
                <label class="fas fa-calendar-day" for="cod_estudiante"> CODIGO ESTUDIANTIL:</label>
                <input wire:model='cod_estudiante' type="text" class="form-control" placeholder="codigo estudiantil" id="cod_estudiante">
                @error('cod_estudiante')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- ci --}}
            <div class="form-group col-md-4">
                <label class="fas fa-calendar-day" for="ci"> CI:</label>
                <input wire:model='ci' type="number" class="form-control" placeholder="ci" id="ci">
                @error('ci')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <hr>
        <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
    </form>
</x-modal>