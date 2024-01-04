<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $noemp, $nombre, $puesto, $departamento, $estatus;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('noemp', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('puesto', 'LIKE', $keyWord)
						->orWhere('departamento', 'LIKE', $keyWord)
						->orWhere('estatus', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->noemp = null;
		$this->nombre = null;
		$this->puesto = null;
		$this->departamento = null;
		$this->estatus = null;
    }

    public function store()
    {
        $this->validate([
		'noemp' => 'required',
		'nombre' => 'required',
		'puesto' => 'required',
		'departamento' => 'required',
		'estatus' => 'required',
        ]);

        Empleado::create([ 
			'noemp' => $this-> noemp,
			'nombre' => $this-> nombre,
			'puesto' => $this-> puesto,
			'departamento' => $this-> departamento,
			'estatus' => $this-> estatus
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);
        $this->selected_id = $id; 
		$this->noemp = $record-> noemp;
		$this->nombre = $record-> nombre;
		$this->puesto = $record-> puesto;
		$this->departamento = $record-> departamento;
		$this->estatus = $record-> estatus;
    }

    public function update()
    {
        $this->validate([
		'noemp' => 'required',
		'nombre' => 'required',
		'puesto' => 'required',
		'departamento' => 'required',
		'estatus' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'noemp' => $this-> noemp,
			'nombre' => $this-> nombre,
			'puesto' => $this-> puesto,
			'departamento' => $this-> departamento,
			'estatus' => $this-> estatus
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Empleado::where('id', $id)->delete();
        }
    }
}