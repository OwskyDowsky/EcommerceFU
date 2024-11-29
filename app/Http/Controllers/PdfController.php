<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function invoice(Ventas $venta)
    {
        $pdf = Pdf::loadView('ventas.invoice', compact('venta'));
        return $pdf->stream('invoice.pdf');
    }
}
