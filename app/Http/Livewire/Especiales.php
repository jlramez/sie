<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Especiale;
use App\Models\Expediente;
use App\Models\Ordinario;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;
use App\Models\Tarea;

class Especiales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $noexp, $year, $actor, $entidad, $trabajador_fallecido, $fecha_recepcion, $acciones_id, $observaciones, 
	$ponencias_id, $tareas_id, $observaciones_revision;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.especiales.view', [
			'ponencias' => Ponencia::latest()->orderby('descripcion','ASC')->get(),
			'actuaciones' => Actuacione::orderby('descripcion','ASC')->get(),
			'tareas' => Tarea::orderby('descripcion','ASC')->get(),
            'especiales' => Especiale::latest()
						->orWhere('noexp', 'LIKE', $keyWord)
						->orWhere('year', 'LIKE', $keyWord)
						->orWhere('actor', 'LIKE', $keyWord)
						->orWhere('entidad', 'LIKE', $keyWord)
						->orWhere('trabajador_fallecido', 'LIKE', $keyWord)
						->orWhere('fecha_recepcion', 'LIKE', $keyWord)
						->orWhere('acciones_id', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->orWhere('ponencias_id', 'LIKE', $keyWord)
						->orWhere('tareas_id', 'LIKE', $keyWord)
						->orWhere('observaciones_revision', 'LIKE', $keyWord)
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
		$this->entidad = null;
		$this->trabajador_fallecido = null;
		$this->fecha_recepcion = null;
		$this->acciones_id = null;
		$this->observaciones = null;
		$this->ponencias_id = null;
		$this->nike = null;
    }

    public function store()
    {
        $this->validate([
		'noexp' => 'required',
		'year' => 'required',
		'actor' => 'required',
		'entidad' => 'required',
		'trabajador_fallecido' => 'required',
		'fecha_recepcion' => 'required',
		'acciones_id' => 'required',
		'observaciones' => 'required',
		'ponencias_id' => 'required',
		
        ]);

        Especiale::create([ 
			'noexp' => $this-> noexp,
			'year' => $this-> year,
			'actor' => $this-> actor,
			'entidad' => $this-> entidad,
			'trabajador_fallecido' => $this-> trabajador_fallecido,
			'fecha_recepcion' => $this-> fecha_recepcion,
			'acciones_id' => $this-> acciones_id,
			'observaciones' => $this-> observaciones,
			'ponencias_id' => $this-> ponencias_id,
			
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Especiale Successfully created.');
    }

    public function edit($id)
    {
        $record = Especiale::findOrFail($id);
        $this->selected_id = $id; 
		$this->noexp = $record-> noexp;
		$this->year = $record-> year;
		$this->actor = $record-> actor;
		$this->entidad = $record-> entidad;
		$this->trabajador_fallecido = $record-> trabajador_fallecido;
		$this->fecha_recepcion = $record-> fecha_recepcion;
		$this->acciones_id = $record-> acciones_id;
		$this->observaciones = $record-> observaciones;
		$this->ponencias_id = $record-> ponencias_id;
		$this->nike = $record-> nike;
    }

    public function update()
    {
        $this->validate([
		'noexp' => 'required',
		'year' => 'required',
		'actor' => 'required',
		'entidad' => 'required',
		'trabajador_fallecido' => 'required',
		'fecha_recepcion' => 'required',
		'acciones_id' => 'required',
		'observaciones' => 'required',
		'ponencias_id' => 'required',
	
        ]);

        if ($this->selected_id) {
			$record = Especiale::find($this->selected_id);
            $record->update([ 
			'noexp' => $this-> noexp,
			'year' => $this-> year,
			'actor' => $this-> actor,
			'entidad' => $this-> entidad,
			'trabajador_fallecido' => $this-> trabajador_fallecido,
			'fecha_recepcion' => $this-> fecha_recepcion,
			'acciones_id' => $this-> acciones_id,
			'observaciones' => $this-> observaciones,
			'ponencias_id' => $this-> ponencias_id,
			
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Especiale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Especiale::where('id', $id)->delete();
        }
    }
	public function show_amparos($id)
	{
        $expedientes=Especiale::where('id',$id)->first();
		$no_amparos=Amparo::where('expediente_tjlbz', );
		dd('El Expediente id: '.$expedientes->noexp.' tiene Amparo');

	}
	public function review($id)
    {
       
        $record = Especiale::findOrFail($id);
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
			$record = Especiale::find($this->selected_id);
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
			$record = Especiale::find($this->selected_id);
            $record->update([ 
			'tareas_id' => $this-> tareas_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Etapa almacenada correctamente.');
        }
    }
}