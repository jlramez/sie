<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paraprocesale;
use App\Models\Expediente;
use App\Models\Ordinario;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;
use App\Models\Tarea;

class Paraprocesales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $noexp, $year, $actor, $demandado, $acciones_id, $fecha_recepcion, $observaciones, $ponencias_id, $tareas_id, $observaciones_revision;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paraprocesales.view', [
			'tareas' => Tarea::orderby('descripcion','ASC')->get(),
			'tipos' => Tipo::latest()->orderby('descripcion','ASC')->get(),
			'ponencias' => Ponencia::latest()->orderby('descripcion','ASC')->get(),
			'actuaciones' => Actuacione::latest()->orderby('descripcion','ASC')->get(),
			'tipos' => Tipo::latest()->orderby('descripcion','ASC')->get(),
            'paraprocesales' => Paraprocesale::latest()
						->orWhere('noexp', 'LIKE', $keyWord)
						->orWhere('year', 'LIKE', $keyWord)
						->orWhere('actor', 'LIKE', $keyWord)
						->orWhere('demandado', 'LIKE', $keyWord)
						->orWhere('acciones_id', 'LIKE', $keyWord)
						->orWhere('fecha_recepcion', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->orWhere('ponencias_id', 'LIKE', $keyWord)
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
		$this->acciones_id = null;
		$this->fecha_recepcion = null;
		$this->observaciones = null;
		$this->ponencias_id = null;
    }

    public function store()
    {
        $this->validate([
		'noexp' => 'required',
		'year' => 'required',
		'actor' => 'required',
		'demandado' => 'required',
		'acciones_id' => 'required',
		'fecha_recepcion' => 'required',
		'observaciones' => 'required',
		'ponencias_id' => 'required',
        ]);

        Paraprocesale::create([ 
			'noexp' => $this-> noexp,
			'year' => $this-> year,
			'actor' => $this-> actor,
			'demandado' => $this-> demandado,
			'acciones_id' => $this-> acciones_id,
			'fecha_recepcion' => $this-> fecha_recepcion,
			'observaciones' => $this-> observaciones,
			'ponencias_id' => $this-> ponencias_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Paraprocesale Successfully created.');
    }

    public function edit($id)
    {
        $record = Paraprocesale::findOrFail($id);
        $this->selected_id = $id; 
		$this->noexp = $record-> noexp;
		$this->year = $record-> year;
		$this->actor = $record-> actor;
		$this->demandado = $record-> demandado;
		$this->acciones_id = $record-> acciones_id;
		$this->fecha_recepcion = $record-> fecha_recepcion;
		$this->observaciones = $record-> observaciones;
		$this->ponencias_id = $record-> ponencias_id;
    }

    public function update()
    {
        $this->validate([
		'noexp' => 'required',
		'year' => 'required',
		'actor' => 'required',
		'demandado' => 'required',
		'acciones_id' => 'required',
		'fecha_recepcion' => 'required',
		'observaciones' => 'required',
		'ponencias_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paraprocesale::find($this->selected_id);
            $record->update([ 
			'noexp' => $this-> noexp,
			'year' => $this-> year,
			'actor' => $this-> actor,
			'demandado' => $this-> demandado,
			'acciones_id' => $this-> acciones_id,
			'fecha_recepcion' => $this-> fecha_recepcion,
			'observaciones' => $this-> observaciones,
			'ponencias_id' => $this-> ponencias_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Paraprocesale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Paraprocesale::where('id', $id)->delete();
        }
    }
	public function update_actions()
    {

      $actuaciones= Actuacione::all();
      $expedientes= Paraprocesale::all();
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
        $expedientes=Paraprocesale::where('id',$id)->first();
		$no_amparos=Amparo::where('expediente_tjlbz', );
		dd('El Expediente id: '.$expedientes->noexp.' tiene Amparo');

	}
	public function review($id)
    {
       
        $record = Paraprocesale::findOrFail($id);
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
			$record = Paraprocesale::find($this->selected_id);
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
			$record = Paraprocesale::find($this->selected_id);
            $record->update([ 
			'tareas_id' => $this-> tareas_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Etapa almacenada correctamente.');
        }
    }
}