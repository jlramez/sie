<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class Permissions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $guard_name;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.permissions.view', [
            'permissions' => Permission::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('guard_name', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->guard_name = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		//'guard_name' => 'required',
        ]);

        Permission::create([ 
			'name' => $this-> name,
			'guard_name' => "web"
        ]);
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Permission Successfully created.');
    }

    public function edit($id)
    {
        $record = Permission::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->guard_name = $record-> guard_name;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'guard_name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Permission::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'guard_name' => $this-> guard_name
            ]);

            $this->resetInput(); 
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Permission Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Permission::where('id', $id)->delete();
        }
    }
}