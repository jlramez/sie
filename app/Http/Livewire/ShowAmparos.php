<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Amparo;
use App\Models\Amtipo;
use App\Models\Juzgado;
use App\Models\Ponencia;
use App\Models\Estado;
use App\Models\Ordinario;
use App\Models\Actuacione;
use App\Models\Tipo;
use App\Models\Tarea;

class ShowAmparos extends Component
{
    use WithPagination;
    public $expediente, $tipoexp, $noexp;
    public function mount(Ordinario $exp)
    {
        $this->expediente= $exp;
       
        
    }
       
        
    public function render()
    {
        return view('livewire.showamparos.ordinarios.show-amparos',[
            'amparos' => Amparo::where('expediente_tjlb', $this->expediente->noexp)->paginate(10),
            'estatus' => Estado::orderby('descripcion', 'ASC')->get(),
			'ponencias' => Ponencia::latest()->get(),
			'amtipos' => Amtipo::latest()->orderby('descripcion', 'ASC')->get(),
			'juzgados' => Juzgado::latest()->orderby('descripcion', 'ASC')->get(),
            'actuaciones' => Actuacione::orderby('descripcion', 'ASC')->get(),
            'tipos' => Tipo::orderby('descripcion', 'ASC')->get(),
            'tareas' => Tarea::orderby('descripcion', 'ASC')->get(),
            'nexp' => $this->expediente->noexp,
        ]);
    }
}
