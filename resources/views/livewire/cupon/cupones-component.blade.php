<div>
    <x-card cardTitle="Lista de cupones ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
                <a href="#" class="btn btn-primary" wire:click='create'>
                    <i class="fas fa-plus-circle"></i> Crear un cupon</a>
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCUENTO</th>
                <th>CATEGORIAS/PRODUCTOS</th>
                <th>FECHA DE CREACION</th>
                <th>FECHA DE VENCIMIENTO</th>
                    <th>ESTADO</th>
                    <th width="6%">EDITAR</th>
                    <th width="6%">BORRAR</th>

            </x-slot>

            @forelse ($cupones as $cupon)
                <tr>
                    <td>{{ $cupon->id }}</td>
                    <td>{{ $cupon->nombre }}</td>
                    <td>{{ $cupon->descuento }} %</td>
                    <td>
                        @foreach ($cupon->categorias as $categoria)
                            <span>{{ $categoria->nombre }}</span>
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                        /
                        @foreach ($cupon->productos as $producto)
                            <span>{{ $producto->nombre }}</span>
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $cupon->created_at }}</td>
                    <td>{{ $cupon->fecha_vencimiento }}</td>
                    
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch{{ $cupon->id }}"
                                    wire:click="toggleEstado({{ $cupon->id }})"
                                    {{ $cupon->estado === 'activo' ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="customSwitch{{ $cupon->id }}">{{ $cupon->estado }}</label>
                            </div>
                        </td>
                        <td>
                            <a href="#" wire:click='edit({{ $cupon->id }})' class="btn btn-warning btn-sm"
                                title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a wire:click="$dispatch('delete',{id: {{ $cupon->id }},
                        eventNombre: 'destroyCupon'})"
                                class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="8">Sin registros</td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{ $cupones->links() }}
        </x-slot>
    </x-card>

    <x-modal modalId="modalCupon" modalTitle="Cupones">
        <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="nombre"> Nombre del cupon:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre del cupon"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="descuento"> Descuento del cupon:</label>
                    <select wire:model="descuento" id="descuento" class="form-control">
                        <option value="0">seleccionar</option>
                        <option value="10">10%</option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="fecha_vencimiento"> Fecha de vencimiento del cupon:</label>
                    <input wire:model='fecha_vencimiento' type="date" class="form-control"
                        placeholder="fecha de vencimiento del cupon" id="fecha_vencimiento">
                    @error('fecha_vencimiento')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Selector para categorías --}}
                <div id="select_categoria" class="form-group col-md-12" wire:ignore>
                    <label class="fas fa-file-signature" for="categorias_id">Categoría del cupón:</label>
                    <div class="ml-auto mr-1 mb-2">
                        <select class="form-control" id="selectcategoria2" multiple wire:model="categorias_id">
                            <option value="" disabled selected>Selecciona la categoría</option>
                            @foreach ($this->categorias as $categorias)
                                <option value="{{ $categorias->id }}">{{ $categorias->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('categorias_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Selector para categorías --}}
                <div id="select_producto" class="form-group col-md-12" wire:ignore>
                    <label class="fas fa-globe" for="productos_id"> Producto del cupon:</label>
                    <div class="ml-auto mr-1 mb-2">
                        <select class="form-control" id="selectproducto2" multiple wire:model="productos_id" id="productos_id">
                            <option value="" disabled selected>seleccionar por producto</option>
                            @foreach ($this->productos as $productos)
                                <option value="{{ $productos->id }}">{{ $productos->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                    @error('productos_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr>
            <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
        </form>

    </x-modal>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endsection
    @section('js')
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

        <script>
            // Inicializar select2
            $(document).ready(function() {
                $('#selectcategoria2').select2({
                    theme: "bootstrap4"
                }).on('change', function(e) {
                    var data = $(this).select2("val");
                    @this.set('categorias_id', data);
                });

                $('#selectproducto2').select2({
                    theme: "bootstrap4"
                }).on('change', function(e) {
                    var data = $(this).select2("val");
                    @this.set('productos_id', data);
                });
            });
        </script>
    @endsection

</div>
