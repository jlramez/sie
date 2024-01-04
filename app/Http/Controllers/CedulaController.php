<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocione;
use App\Models\Asignadocumento;
use App\Models\Ordinario;
use carbon\carbon;
use PDF;

class CedulaController extends Controller
{
    public function pdf(Promocione $promocion)
    {

        $fecha=carbon::parse(now(),'America/Mexico_city')->isoFormat('DD MMMM YYYY');
        $expediente=Ordinario::where('noexp', $promocion->noexp)->first();
        $existe_exp=Ordinario::where('noexp', $promocion->noexp)->count();
       
        $resultado=Asignadocumento::where('promociones_id', $promocion->id)->paginate(100);
        $pdf = Pdf::loadView('livewire.asignadocumentos.cedula',['existe_exp' => $existe_exp, 'promocion' => $promocion, 'expediente' => $expediente, 'resultado' => $resultado, 'fecha' => $fecha])->setPaper('letter', 'portrait')
        ->setOptions(['defaultFont' => 'sans-serif']);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
       
    }
}
