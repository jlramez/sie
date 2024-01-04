<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
//use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class Roles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $guard_name,$permisos=[];

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.roles.view', [
            'rsp' => Permission::all(),
            'roles' => Role::latest()
						->orWhere('name', 'LIKE', $keyWord)
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
            ]);

        Role::create(['name'=>$this-> name,'guard_name'=>"web"]);
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Role Successfully created.');
    }

    public function edit($id)
    {
        $record = Role::findOrFail($id);
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
			$record = Role::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'guard_name' => $this-> guard_name
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Role Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Role::where('id', $id)->delete();
        }
    }

    public function addpermissions($id)
    {
        
        $record = Role::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;

    }
    public function storepermissions()
    {
        $this->validate([
            'permisos' => 'required',
            'name' => 'required',
            ]);
            foreach ($this->permisos as $permiso_id=>$valor)
    		{
                $nombre_permiso=$valor;
                $nombre_rol=$this->name;
                $permission = Permission::findByName($nombre_permiso);
                $permission->assignRole([$nombre_rol]); 
            }
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');           
            session()->flash('message', 'Permisos asignados correctamente.');
    }
    public function editpermissions($id)
            {
                
                $record = Role::findOrFail($id);
                $this->selected_id = $id; 
                $this->name = $record-> name;
        
            }
            public function updatepermissions()
            {
                $this->validate([
                'name' => 'required',
                //'guard_name' => 'required',
                ]);
                    if ($this->selected_id) 
                {
                    foreach ($this->permisos as $permiso_id=>$valor)
                    {
                        $nombre_permiso=$valor;
                        $nombre_rol=$this->name;
                        $permission = Permission::findByName($nombre_permiso);
                        $role=Role::findbyName($nombre_rol);
                        $role->revokePermissionTo($permission->id);
                    }
                
                    $this->resetInput();
                    $this->dispatchBrowserEvent('closeModal');
                    session()->flash('message', 'Permiso elimindado satisfactoriamente');
                
                }
        }
}