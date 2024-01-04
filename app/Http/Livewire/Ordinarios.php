<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expediente;
use App\Models\Ordinario;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;
use App\Models\Tarea;
use App\Models\Amparo;



class Ordinarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $noexp, $year, $actor, $demandado, $no_actores, $actuaciones_id, $ponencias_id, $tipos_id, $original,
	 $duplicado, $observaciones, $acumulado, $observaciones_colegiado, $tareas_id, $observaciones_revision, $fecha_observacion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.ordinarios.view', [
			'tareas' => Tarea::orderby('descripcion','ASC')->get(),
			'tipos' => Tipo::latest()->orderby('descripcion','ASC')->get(),
			'ponencias' => Ponencia::latest()->orderby('descripcion','ASC')->get(),
			'actuaciones' => Actuacione::latest()->orderby('descripcion','ASC')->get(),
			'tipos' => Tipo::latest()->orderby('descripcion','ASC')->get(),
            'ordinarios' => Ordinario::latest()
						->orWhere('noexp', 'LIKE', $keyWord)
						->orWhere('year', 'LIKE', $keyWord)
						->orWhere('actor', 'LIKE', $keyWord)
						->orWhere('demandado', 'LIKE', $keyWord)
						->orWhere('no_actores', 'LIKE', $keyWord)
						->orWhere('actuaciones_id', 'LIKE', $keyWord)
						->orWhere('ponencias_id', 'LIKE', $keyWord)
						->orWhere('tipos_id', 'LIKE', $keyWord)
						->orWhere('original', 'LIKE', $keyWord)
						->orWhere('duplicado', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->orWhere('acumulado', 'LIKE', $keyWord)						
						->orWhere('observaciones_colegiado', 'LIKE', $keyWord)
						->orWhere('fecha_observacion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->noexp = null;
		$this->year = null;
		$this->actor = null;
		$this->demandado = null;
		$this->no_actores = null;
		$this->tipos_id = null;
		$this->ponencias_id = null;
		$this->estatus_id = null;
		$this->original = null;
		$this->duplicado = null;
		$this->observaciones = null;
		$this->acumulado = null;
		$this->observaciones_colegiado = null;
		$this->fecha_observacion = null;
		$this->actuaciones_id= null;
    }

    public function store()
    {
        $this->validate([
		'noexp' => 'required',
		'year' => 'required',
		'actor' => 'required',
		'demandado' => 'required',
		'no_actores' => 'required',
		'actuaciones_id' => 'required',
		'ponencias_id' => 'required',
		'tipos_id' => 'required',
		'original' => 'required',
		'duplicado' => 'required',
		'observaciones' => 'required',
		'acumulado' => 'required',
		'observaciones_colegiado' => 'required',
        ]);

        Ordinario::create([ 
			'noexp' => $this-> noexp,
			'year' => $this-> year,
			'actor' => $this-> actor,
			'demandado' => $this-> demandado,
			'no_actores' => $this-> no_actores,
			'actuaciones_id' => $this-> actuaciones_id,
			'ponencias_id' => $this-> ponencias_id,
			'tipos_id' => $this-> tipos_id,
			'original' => $this-> original,
			'duplicado' => $this-> duplicado,
			'observaciones' => $this-> observaciones,
			'acumulado' => $this-> acumulado,
			'observaciones_colegiado' => $this-> observaciones_colegiado,
			'fecha_observacion' => $this->fecha_observacion,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Expediente Successfully created.');
    }

    public function edit($id)
    {
        $record = Ordinario::findOrFail($id);
        $this->selected_id = $id; 
		$this->noexp = $record-> noexp;
		$this->year = $record-> year;
		$this->actor = $record-> actor;
		$this->demandado = $record-> demandado;
		$this->no_actores = $record-> no_actores;
		$this->actuaciones_id = $record-> acciones_id;
		$this->ponencias_id = $record-> ponencias_id;
		$this->tipos_id = $record-> tipos_id;
		$this->original = $record-> original;
		$this->duplicado = $record-> duplicado;
		$this->observaciones = $record-> observaciones;
		$this->acumulado = $record-> acumulado;
		$this->observaciones_colegiado = $record-> observaciones_colegiado;
		$this->fecha_observacion = $record->fecha_observacion;
    }

    public function update()
    {
        $this->validate([
		'noexp' => 'required',
		'year' => 'required',
		'actor' => 'required',
		'demandado' => 'required',
		'no_actores' => 'required',
		'actuaciones_id' => 'required',
		'ponencias_id' => 'required',
		'tipos_id' => 'required',
		'original' => 'required',
		'duplicado' => 'required',
		'observaciones' => 'required',
		'acumulado' => 'required',
		'observaciones_colegiado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ordinario::find($this->selected_id);
            $record->update([ 
			'noexp' => $this-> noexp,
			'year' => $this-> year,
			'actor' => $this-> actor,
			'demandado' => $this-> demandado,
			'no_actores' => $this-> no_actores,
			'actuaciones_id' => $this-> acciones_id,
			'ponencias_id' => $this-> ponencias_id,
			'tipos_id' => $this-> tipos_id,
			'original' => $this-> original,
			'duplicado' => $this-> duplicado,
			'observaciones' => $this-> observaciones,
			'acumulado' => $this-> acumulado,
			'observaciones_colegiado' => $this-> observaciones_colegiado,
			'fecha_observacion' => $this->fecha_observacion,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Expediente Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Ordinario::where('id', $id)->delete();
        }
    }
	public function update_actions()
    {

      $actuaciones= Actuacione::all();
      $expedientes= Ordinario::all();
      foreach ($expedientes as $row)
      {
         foreach ($actuaciones as $record)
		 	{
				if ($row->actuaciones_id === $record->descripcion)
				 {
					$row->actuaciones_id= $record->id;
					$row->save();
				 }
			}
                
      }
    
    }
	public function show_amparos($id)
	{
        $expedientes=Ordinario::where('id',$id)->first();
		$no_amparos=Amparo::where('expediente_tjlbz', );
		dd('El Expediente id: '.$expedientes->noexp.' tiene Amparo');

	}
	public function review($id)
    {
       
        $record = Ordinario::findOrFail($id);
        $this->selected_id = $id; 
        if($record->revisado==1)
        {
            $record->revisado=0;
            $record->save();
            session()->flash('message', 'Expediente No revisado.');
         }
         else
            {
            $record->revisado=1;
            $record->save();
            session()->flash('message', 'Expediente  revisado.');
            } 
    }
	public function addcomment($id)
    {
        $this->selected_id = $id; 				
    }
	public function store_comment()
    {
        $this->validate([
		'observaciones_revision' => 'required',
	
		
        ]);
		
        if ($this->selected_id) {
			$record = Ordinario::find($this->selected_id);
            $record->update([ 
			'observaciones_revision' => $this-> observaciones_revision,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Observación almacenada correctamente.');
        }
    }
	public function addetapa($id)
    {
        $this->selected_id = $id; 				
    }
	public function store_etapa()
    {
        $this->validate([
		'tareas_id' => 'required',
	
		
        ]);
        if ($this->selected_id) {
			$record = Ordinario::find($this->selected_id);
            $record->update([ 
			'tareas_id' => $this-> tareas_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Etapa almacenada correctamente.');
        }
    }
}