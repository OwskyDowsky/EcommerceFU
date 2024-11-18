<?php

namespace App\Livewire\Venta;

use App\Models\Cart;
use App\Models\Ventas;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Lista de Ventas')]
class VentaList extends Component
{
    use WithPagination;
   
    //Propiedades clase
    public $search='';
    public $totalRegistros=0;
    public $cant=5;

    public function render()
    {
        Cart::clear();
        if($this->search!=''){
            $this->resetPage();
        }

        $ventasQuery = Ventas::query();

        if ($this->search) {
            $ventasQuery->where(function ($query) {
                $query->whereHas('clientes', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->orWhere('id', 'like', '%' . $this->search . '%');
            });
        }
        // Paginación
        $ventas = $ventasQuery
            ->orderBy('id', 'desc')
            ->paginate($this->cant);

        return view('livewire.venta.venta-list',[
            "ventas"=>$ventas
        ]);
    }

    // Componente Livewire que escucha el evento y realiza la acción.
    #[On('anularVentas')]
public function anular($id)
{
    // Buscar la venta con el ID proporcionado
    $venta = Ventas::find($id);

    if ($venta) {
        // Cambiar el estado de la venta a 'inusable'
        $venta->estado = 'anulado';
        $venta->fecha_anulacion = Carbon::now();
        $venta->save(); // Guardar los cambios

        // Puedes agregar un mensaje de confirmación o un evento adicional si lo necesitas
        session()->flash('msg', 'Venta anulada correctamente.');
    } else {
        session()->flash('msg', 'Venta no encontrada.');
    }
}

}
