<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipodocumento;

class Tipodocumentos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipodocumentos.view', [
            'tipodocumentos' => Tipodocumento::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
        ]);

        Tipodocumento::create([ 
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Tipodocumento Successfully created.');
    }

    public function edit($id)
    {
        $record = Tipodocumento::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
            'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tipodocumento::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Tipodocumento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Tipodocumento::where('id', $id)->delete();
        }
    }
}