<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function index(){
        $partidos = Partido::all();
        view()->share('partidos', $partidos);
        $pdf = Pdf::loadView('admin.reporte.index', compact('partidos'));
        return $pdf->download('cronograma.pdf');
    }
}
