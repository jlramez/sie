<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actuacione;

class Actuaciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $activo;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.actuaciones.view', [
            'actuaciones' => Actuacione::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('activo', 'LIKE', $keyWord)
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
		$this->activo = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
        ]);

        Actuacione::create([ 
			'descripcion' => $this-> descripcion,
			'activo' => $this-> activo
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Actuacione Successfully created.');
    }

    public function edit($id)
    {
        $record = Actuacione::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->activo = $record-> activo;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actuacione::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion,
			'activo' => $this-> activo
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Actuacione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Actuacione::where('id', $id)->delete();
        }
    }
}