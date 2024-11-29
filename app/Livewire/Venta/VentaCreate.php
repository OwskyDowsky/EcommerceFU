<?php

namespace App\Livewire\Venta;

use App\Models\Cart;
use App\Models\Cupones;
use App\Models\Item;
use Livewire\Component;
use App\Models\Productos;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Crear ventas')]
class VentaCreate extends Component
{
    use WithPagination;

    // Propiedades
    public $search = '';
    public $cant = 5;
    public $totalRegistro = 0;
    public $client = 1;
    public $pago = 0;
    public $devuelve = 0;
    public $fecha;
    public $updating = 0;
    public $estado = 'activo';
    public $producto_id;
    public $cupon_id;
    public $descuento = 0;   // El porcentaje de descuento
    public $totalConDescuento = 0;

    // Actualizar el total cuando se cambia el cupón seleccionado
    public function updatedCuponId($value)
    {
        // Encontramos el cupón seleccionado
        $cupon = Cupones::find($value);

        if ($cupon) {
            // Aplicamos el descuento (suponiendo que el descuento es un porcentaje)
            $this->descuento = $cupon->descuento;
        } else {
            $this->descuento = 0;
        }

        // Recalcular el total con descuento
        $this->calcularTotalConDescuento();
    }

    // Calcular el total con el descuento
    public function calcularTotalConDescuento()
    {
        // Obtener el total original del carrito
        $total = Cart::getTotal();

        // Aplicar el descuento (si existe)
        $this->totalConDescuento = $total - ($total * ($this->descuento / 100));

        // Asegurarse de que el total con descuento no sea negativo
        $this->totalConDescuento = max(0, $this->totalConDescuento);
        
        // Si el total con descuento es 0, ajustar el pago y devuelve
        if ($this->totalConDescuento > 0) {
            $this->pago = $this->totalConDescuento;  // El pago es el total con descuento
        } else {
            $this->pago = $total;  // Si no hay descuento, el pago es el total normal
        }

        // Actualizar el valor que el cliente tiene que devolver
        $this->devuelve = $this->pago - $this->totalConDescuento;
    }

    public function render()
    {
        if ($this->search != '') {
            $this->resetPage();
        }
        $this->totalRegistro = Productos::count();

        // Recalcular el total con descuento al inicio
        if ($this->updating == 0) {
            $this->calcularTotalConDescuento();  // Asegurarse de que se calcule el total con descuento correctamente
        }

        return view('livewire.venta.venta-create', [
            'productos' => $this->productos,
            'cart' => Cart::getCart(),
            'total' => Cart::getTotal(),
            'totalArticulos' => Cart::totalArticulos(),
            'cupones' => $this->cupones,
        ]);
    }

    // Crear venta
    public function createVenta()
    {
        $cart = Cart::getCart();

        if (count($cart) == 0) {
            $this->dispatch('msg', 'no hay productos', "danger");
            return;
        }

        // Si el pago es menor al total con descuento, ajustamos el pago
        if ($this->pago < $this->totalConDescuento) {
            $this->pago = $this->totalConDescuento;
            $this->devuelve = 0;
        }

        DB::transaction(function () {
            $venta = new Ventas();
            $venta->total = $this->totalConDescuento; // Guardar el total con descuento
            $venta->pago = $this->pago;
            $venta->users_id = userID();
            $venta->clientes_id = $this->client;
            $venta->fecha = date('Y-m-d');
            // Si hay un cupón, lo asignamos
            if ($this->cupon_id) {
                $venta->cupon_id = $this->cupon_id;
            }
            $venta->save();

            foreach (\Cart::session(userID())->getContent() as $producto) {
                $item = new Item();
                $item->nombre = $producto->name;
                $item->precio = $producto->price;
                $item->producto_id = $producto->id;
                $item->qty = $producto->quantity;
                $item->imagen = $producto->associatedModel->imagen;
                $item->fecha = date('Y-m-d');
                if ($this->cupon_id) {
                    $item->cupon_id = $this->cupon_id;
                }

                $item->save();
                $venta->items()->attach($item->id, ['qty' => $producto->quantity, 'fecha' => date('Y-m-d')]);
                Productos::find($producto->id)->decrement('stock', $producto->quantity);
            }

            Cart::clear();
            $this->reset(['pago', 'devuelve', 'client','cupon_id', 'descuento', 'totalConDescuento']);
            $this->dispatch('msg', 'venta creada correctamente', 'success');
        });
    }

    public function mount()
    {
        $this->client_id($this->client);
    }

    public function updatingPago($value)
    {
        $this->updating = 1;

        // El pago no puede ser menor que el total con descuento
        if ($value < $this->totalConDescuento) {
            $this->pago = $this->totalConDescuento;
        } else {
            $this->pago = $value;
        }

        // El valor a devolver es la diferencia entre lo que paga el cliente y el total con descuento
        $this->devuelve = $this->pago - $this->totalConDescuento;
    }

    #[On('add-producto')]
    public function addProducto(Productos $producto)
    {
        $this->updating = 0;
        Cart::add($producto);
    }

    public function decrement($id)
    {
        $this->updating = 0;
        Cart::decrement($id);
        $this->dispatch("incrementStock.{$id}");
    }

    public function clear()
    {
        Cart::clear();
        $this->pago = 0;
        $this->updating = 0;
        $this->dispatch('msg', 'Venta cancelada');
        $this->dispatch('refreshProductos');
    }

    #[Computed()]
    public function productos()
    {
        return Productos::where('nombre', 'like', '%' . $this->search . '%')
            ->where('estado', 'activo')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
    }

    #[Computed()]
    public function cupones()
    {
        return Cupones::all();
    }

    #[On('client_id')]
    public function client_id($id = 1)
    {
        $this->client = $id;
    }
}
