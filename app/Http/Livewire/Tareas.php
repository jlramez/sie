<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tarea;

class Tareas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $etapas_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tareas.view', [
            'tareas' => Tarea::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('etapas_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->descripcion = null;
		$this->etapas_id = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'etapas_id' => 'required',
        ]);

        Tarea::create([ 
			'descripcion' => $this-> descripcion,
			'etapas_id' => $this-> etapas_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Tarea Successfully created.');
    }

    public function edit($id)
    {
        $record = Tarea::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->etapas_id = $record-> etapas_id;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'etapas_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tarea::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion,
			'etapas_id' => $this-> etapas_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Tarea Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Tarea::where('id', $id)->delete();
        }
    }
}