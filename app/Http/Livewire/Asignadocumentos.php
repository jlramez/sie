<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asignadocumento;
use App\Models\Promocione;
use App\Models\Ordinario;
class Asignadocumentos extends Component
{
    public $promo, $exp;
    public function mount($id)
    {       
        $this->promo=Promocione::find($id);  
        $this->exp=Ordinario::where('noexp', $this->promo->noexp)->first();
        $this->promo_id=$id;
    }
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cantidad, $fojas, $promociones_id, $documento, $expediente, $actor, $demandado, $folio;

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.asignadocumentos.view', [
            'promo' => $this->promo,
            'exp' => $this->exp,
            'asignadocumentos' => Asignadocumento::where('promociones_id', $this->promo->id)->paginate(10),
            
						/*->orWhere('cantidad', 'LIKE', $keyWord)
						->orWhere('fojas', 'LIKE', $keyWord)
						->orWhere('promociones_id', 'LIKE', $keyWord)
						->orWhere('tipodocumentos_id', 'LIKE', $keyWord)*/
						
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->cantidad = null;
		$this->fojas = null;
		$this->promociones_id = null;
		$this->documento = null;
    }

    public function store()
    {
        $this->validate([
		'cantidad' => 'required',
		'fojas' => 'required',	
		'documento' => 'required',
        ]);

        Asignadocumento::create([ 
			'cantidad' => $this-> cantidad,
			'fojas' => $this-> fojas,
			'promociones_id' => $this-> promo_id,
			'documento' => $this-> documento
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Asignadocumento Successfully created.');
    }

    public function edit($id)
    {
        $record = Asignadocumento::findOrFail($id);
        $this->selected_id = $id; 
		$this->cantidad = $record-> cantidad;
		$this->fojas = $record-> fojas;
		$this->promociones_id = $record-> promociones_id;
		$this->tipodocumentos_id = $record-> tipodocumentos_id;
    }

    public function update()
    {
        $this->validate([
		'cantidad' => 'required',
		'fojas' => 'required',
		'promociones_id' => 'required',
		'tipodocumentos_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Asignadocumento::find($this->selected_id);
            $record->update([ 
			'cantidad' => $this-> cantidad,
			'fojas' => $this-> fojas,
			'promociones_id' => $this-> promociones_id,
			'tipodocumentos_id' => $this-> tipodocumentos_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Asignadocumento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Asignadocumento::where('id', $id)->delete();
        }
    }
}