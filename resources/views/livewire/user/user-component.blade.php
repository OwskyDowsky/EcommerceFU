<div>
    <x-card cardTitle="Lista Usuarios ({{ $this->totalRegistros }})">
        <x-slot:cardTools>
            @can('Usuario crear')
                <a href="#" class="btn btn-primary" wire:click='create'>
                    <i class="fas fa-plus-circle"></i> Agregar Usuario
                </a>
            @endcan
        </x-slot>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>IMAGEN</th>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>EMAIL</th>
                @can('Usuario baja')
                    <th>ESTADO</th>
                @endcan
                    <th width="6%">ROL</th>
                <th width="6%">VER</th>
                @can('Usuario editar')
                    <th width="6%">ROLES</th>
                    <th width="6%">EDITAR</th>
                @endcan
                @can('Usuario eliminar')
                    <th width="6%">BORRAR</th>
                @endcan

            </x-slot>

            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <x-image :item="$user" />
                    </td>
                    <td>{{ $user->ci }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->apellido_paterno }}</td>
                    <td>{{ $user->email }}</td>
                    @can('Usuario baja')
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch{{ $user->id }}"
                                    wire:click="toggleEstado({{ $user->id }})"
                                    {{ $user->estado === 'activo' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="customSwitch{{ $user->id }}">{{ $user->estado }}</label>
                            </div>
                        </td>
                    @endcan
                    <td>
                        @php
                            // Define un array de colores
                            $colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
                        @endphp

                        @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $index => $role)
                                <span class="badge {{ $colors[$index % count($colors)] }}">{{ $role->name }}</span>
                            @endforeach
                        @else
                            <span class="badge bg-secondary">Sin rol asignado</span>
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('users.ver', $user) }}" class="btn btn-success btn-sm" title="Ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @can('Usuario editar')
                        <td>
                            <a href="#" class="btn btn-info btn-sm" title="Roles"
                                wire:click='openRoleModal({{ $user->id }})'>
                                <i class="fas fa-user-tag"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" wire:click='edit({{ $user->id }})' class="btn btn-warning btn-sm" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    @endcan
                    @can('Usuario eliminar')
                        <td>
                            <a wire:click="$dispatch('delete',{id: {{ $user->id }}, eventNombre: 'destroyUser'})"
                                class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="11">Sin registros</td>
                </tr>
            @endforelse


        </x-table>

        <x-slot:cardFooter>
            {{ $users->links() }}

        </x-slot>
    </x-card>


    <x-modal modalId="modalUser" modalTitle="Usuarios" modalSize="modal-lg">
        <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
            <div class="form-row">
                {{-- nombre --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-file-signature" for="name"> Nombree:</label>
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre del usuario"
                        id="name">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- apellido paterno --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-file-signature" for="apellido_paterno"> Apellido Paterno:</label>
                    <input wire:model='apellido_paterno' type="text" class="form-control"
                        placeholder="Apellido del usuario" id="apellido_paterno">
                    @error('apellido_paterno')
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
                {{-- email --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="email"> Correo Electronico:</label>
                    <input wire:model='email' type="email" class="form-control"
                        placeholder="Correo Electronico del usuario" id="email">
                    @error('email')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- password --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="password"> Contraseña:</label>
                    <input wire:model='password' type="password" class="form-control"
                        placeholder="Contraseña del usuario" id="password">
                    @error('password')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- repetir password --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="re_password"> Confirmar Contraseña:</label>
                    <input wire:model='re_password' type="password" class="form-control"
                        placeholder="Confirmar contraseña del usuario" id="re_password">
                    @error('re_password')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- rol --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="selectedRole"> Rol:</label>
                    <select wire:model='selectedRole' class="form-control" id="selectedRole">
                        <option value="" disabled selected>Selecciona un rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('selectedRole')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- imagen --}}
                <div class="form-group col-md-12">
                    <label for="image"> Imagen:</label>
                    <input wire:model='image' type="file" id="image" accept="image/*">
                </div>
                <div class="col-md-12">
                    @if ($Id > 0)
                        <x-image :item="$user = App\Models\User::find($Id)" size="200" float="float-right" />
                    @endif
                    @if ($this->image)
                        <img src="{{ $image->temporaryUrl() }}" class="rounded float-left" width="200">
                    @endif

                </div>
            </div>
            <hr>
            <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
        </form>
    </x-modal>

    <x-modal modalId="modalUserEdit" modalTitle="Usuarios" modalSize="modal-lg">
        <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
            <div class="form-row">
                {{-- nombre --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-file-signature" for="name"> Nombree:</label>
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre del usuario"
                        id="name">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- apellido paterno --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-file-signature" for="apellido_paterno"> Apellido Paterno:</label>
                    <input wire:model='apellido_paterno' type="text" class="form-control"
                        placeholder="Apellido del usuario" id="apellido_paterno">
                    @error('apellido_paterno')
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
                {{-- email --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="email"> Correo Electronico:</label>
                    <input wire:model='email' type="email" class="form-control"
                        placeholder="Correo Electronico del usuario" id="email">
                    @error('email')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- password --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="password"> Contraseña:</label>
                    <input wire:model='password' type="password" class="form-control"
                        placeholder="Contraseña del usuario" id="password">
                    @error('password')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- repetir password --}}
                <div class="form-group col-4">
                    <label class="fas fa-file-signature" for="re_password"> Confirmar Contraseña:</label>
                    <input wire:model='re_password' type="password" class="form-control"
                        placeholder="Confirmar contraseña del usuario" id="re_password">
                    @error('re_password')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- imagen --}}
                <div class="form-group col-md-12">
                    <label for="image"> Imagen:</label>
                    <input wire:model='image' type="file" id="image" accept="image/*">
                </div>
                <div class="col-md-12">
                    @if ($Id > 0)
                        <x-image :item="$user = App\Models\User::find($Id)" size="200" float="float-right" />
                    @endif
                    @if ($this->image)
                        <img src="{{ $image->temporaryUrl() }}" class="rounded float-left" width="200">
                    @endif

                </div>
            </div>
            <hr>
            <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
        </form>
    </x-modal>

    {{-- Modal Roles --}}
    <x-modal modalId="modalRoles" modalTitle="Asignar Rol" modalSize="modal-md">
        <div class="form-group">
            <label for="role"> Rol:</label>
            <select wire:model="selectedRole" class="form-control" id="selectedRole">
                <option value="" disabled selected>Seleccione un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('selectedRole')
                <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button wire:click="assignRole" class="btn btn-primary float-right">Asignar Rol</button>
    </x-modal>


</div>
