<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expediente;
use App\Models\Ordinario;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;

class Expedientes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $noexp, $year, $actor, $demandado, $no_actores, $acciones_id, $ponencias_id, $tipos_id, $original, $duplicado, $observaciones, $acumulado, $fecha_promocion, $observaciones_colegiado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.expedientes.view', [
			'tipos' => Tipo::latest()->get(),
			'ponencias' => Ponencia::latest()->get(),
			'actuaciones' => Actuacione::latest()->get(),
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
						->orWhere('fecha_promocion', 'LIKE', $keyWord)
						->orWhere('observaciones_colegiado', 'LIKE', $keyWord)
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
		$this->fecha_promocion = null;
		$this->observaciones_colegiado = null;
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
		'fecha_promocion' => 'required',
		'observaciones_colegiado' => 'required',
        ]);

        Ordinario::create([ 
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
			'fecha_promocion' => $this-> fecha_promocion,
			'observaciones_colegiado' => $this-> observaciones_colegiado
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
		$this->fecha_promocion = $record-> fecha_promocion;
		$this->observaciones_colegiado = $record-> observaciones_colegiado;
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
		'fecha_promocion' => 'required',
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
			'fecha_promocion' => $this-> fecha_promocion,
			'observaciones_colegiado' => $this-> observaciones_colegiado
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
}