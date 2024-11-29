<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-wallet"></i> Pago </h3>

        <div class="card-tools d-flex justify-content-center align-self-center">

            <span class="mr-2">Total: <b>{{ $total }}</b></span>

            <!-- Incluir boton moneda -->

        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <label for="pago">Pago:</label>
                <div class="input-group ">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>

                    <input type="number" wire:model.live="pago" class="form-control" id="pago"
                        min="{{ $total }}">

                </div>
                <p>0 pesos</p>
            </div>
            <div class="col-6">
                <label for="pago">Devuelve:</label>
                <div class="input-group ">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input type="number" wire:model.live="devuelve" class="form-control" min="0" readonly>


                </div>
                <p>0 pesos</p>
            </div>
            <div class="col-md-12">
                <label for="pago">Cupon:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <select class="form-control" wire:model.live="cupon_id">
                        <option value="0">Seleccionar</option>
                        @foreach ($cupones as $cupon)
                            <option value="{{ $cupon->id }}">{{ $cupon->nombre }} {{ $cupon->descuento }} %</option>
                        @endforeach

                    </select>
                </div>
                @if ($descuento > 0)
                    <p>Descuento aplicado: {{ $descuento }}%</p>
                @endif
            </div>
            <div class="col-md-12">
                <label for="total">Total con Descuento:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" value="{{ number_format($totalConDescuento, 2) }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
