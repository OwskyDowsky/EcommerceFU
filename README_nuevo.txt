creacion de bases de datos SQL:
CREATE TABLE categoria_cupon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cupon_id INT NOT NULL,
    categoria_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cupon_id) REFERENCES cupones(id) ON DELETE CASCADE,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE
);

CREATE TABLE producto_cupon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cupon_id INT NOT NULL,
    producto_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cupon_id) REFERENCES cupones(id) ON DELETE CASCADE,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE
);



//CON SELECT MULTIPLE
                {{-- Selector para categorías --}}
                <div id="select_categoria" class="form-group col-md-6" style="display:none;" wire:ignore>
                    <label class="fas fa-file-signature" for="categoria_id">Categoría del cupón:</label>
                    <div class="ml-auto mr-1 mb-2" >
                        <select class="form-control" id="selectcategoria2" multiple wire:model="categoria_id">
                            <option value="" disabled selected>Selecciona la categoría</option>
                            @foreach ($this->categorias as $categorias)
                                <option value="{{ $categorias->id }}">{{ $categorias->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('categoria_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Selector para productos --}}
                <div id="select_producto" class="form-group col-md-6" style="display:none;" wire:ignore>
                    <label class="fas fa-file-signature" for="producto_id">Producto del cupón:</label>
                    <div class="ml-auto mr-1 mb-2">
                        <select class="form-control" id="selectproducto2" multiple wire:model="producto_id">
                            <option value="" disabled selected>Selecciona el producto</option>
                            @foreach ($this->productos as $productos)
                                <option value="{{ $productos->id }}">{{ $productos->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('producto_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>


//CON CHECKBOX
                {{-- Selector para categorías --}}
                <div id="select_categoria" class="form-group col-md-6" style="display:none;">
                    <label class="fas fa-file-signature" for="categoria_id">Categoría del cupón:</label>
                    <div class="ml-auto mr-1 mb-2">
                        @foreach ($this->categorias as $categoria)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="categoria_id" value="{{ $categoria->id }}" id="categoria_{{ $categoria->id }}">
                                <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                                    {{ $categoria->nombre }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('categoria_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                

                {{-- Selector para productos --}}
                <div id="select_producto" class="form-group col-md-6" style="display:none;">
                    <label class="fas fa-file-signature" for="producto_id">Producto del cupón:</label>
                    <div class="ml-auto mr-1 mb-2">
                        @foreach ($this->productos as $producto)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="producto_id" value="{{ $producto->id }}" id="producto_{{ $producto->id }}">
                                <label class="form-check-label" for="producto_{{ $producto->id }}">
                                    {{ $producto->nombre }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('producto_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
