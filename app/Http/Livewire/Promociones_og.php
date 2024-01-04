<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Promocione;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Ptipo;
use App\Models\Afile;
use App\Models\Archivo;
use App\Models\Tipodocumento;
use App\models\Asignadocumento;
use Carbon\carbon;
use Illuminate\Support\Facades\DB;
class Promociones extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $folio, $noexp, $fecha_recibido_op, $fecha_turnado, 
	$promovente, $asunto, $fojas, $empleados_id, $ptipos_id, $archivos=[], $licenciados_id,
	$cantidad, $fojas_cedula, $tipodocumentos_id, $promo_id ;

    public function render()
    {
		$profile=auth()->user()->getRoleNames()->first();
        $promo_id=$this->promo_id;
		
		switch ($profile)	
		{
			case "admin":
					
				
					
				$keyWord = '%'.$this->keyWord .'%';
				if($keyWord==='%%')
				{
					$promociones=Promocione::latest()				
					->paginate(10);
				
				}
				else
					{
						$promociones=Promocione::latest()					
						->orWhere('folio', 'LIKE', $keyWord)
						->orWhere('noexp', 'LIKE', $keyWord)
						->paginate(10);
					}

					if($promo_id)
					{	
						$existe_exp=Ordinario::where('noexp', $promocion->noexp)->count();
						$asignadocumentos=Asignadocumento::where('promociones_id', $promo_id)->latest()->get();
						return view('livewire.promociones.view', [
						
							'existe_exp' => $existe_exp,
							'asignadocumentos' => $asignadocumentos,
							'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
							'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
							'usuarios' => User::orderby('name','ASC')->get(),
							'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
							'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
							'promociones' => $promociones,
						]);
						
						
					}
					else 
					 {
						$asignadocumentos=Asignadocumento::where('promociones_id', null)->latest()->get();
						return view('livewire.promociones.view', [
						
							'asignadocumentos' => $asignadocumentos,
							'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
							'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
							'usuarios' => User::orderby('name','ASC')->get(),
							'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
							'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
							'promociones' => $promociones,
						]);
					 }
					
			break;
			case "instructor":	
				
					$keyWord = '%'.$this->keyWord .'%';
					if($keyWord==='%%')
					{
						$promociones=Promocione::latest()
						->where('licenciados_id',auth()->user()->id)					
						->latest()
						->paginate(10);
					
					}
					else
						{
							$promociones=Promocione::latest()					
							->orWhere('folio', 'LIKE', $keyWord)->where('licenciados_id', '=', auth()->user()->id)
							->orWhere('noexp', 'LIKE', $keyWord)->where('licenciados_id', '=', auth()->user()->id) 
							->paginate(10);
						
						}

						return view('livewire.promociones.view', [
							
							'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
							'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
							'usuarios' => User::orderby('name','ASC')->get(),
							'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
							'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
							'promociones' => $promociones,
						]);
			break;	
			case "auxiliar":
					
	
						$keyWord = '%'.$this->keyWord .'%';
						if($keyWord==='%%')
						{
							$promociones=Promocione::latest()
							->where('empleados_id',auth()->user()->id)					
							->latest()
							->paginate(10);
						
						}
						else
							{
								$promociones=Promocione::latest()					
								->orWhere('folio', 'LIKE', $keyWord)->where('empleados_id', '=', auth()->user()->id)
								->orWhere('noexp', 'LIKE', $keyWord)->where('empleados_id', '=', auth()->user()->id) 
								->paginate(10);
							
							}
	
							return view('livewire.promociones.view', [
								
								'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
								'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
								'usuarios' => User::orderby('name','ASC')->get(),
								'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
								'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
								'promociones' => $promociones,
							]);
			break;
			case "oficialia":
					
	            $existe_exp=Ordinario::where('noexp', $promocion->noexp)->count();
				$keyWord = '%'.$this->keyWord .'%';
						$promociones=Promocione::latest()					
						->orWhere('folio', 'LIKE', $keyWord)
						->orWhere('noexp', 'LIKE', $keyWord)
						->paginate(10);
				

					return view('livewire.promociones.view', [
						
						'existe_exp' => $existe_exp,
						'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
						'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
						'usuarios' => User::orderby('name','ASC')->get(),
						'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
						'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
						'promociones' => $promociones,
					]);
			break;
			case "amparos":
					
	
				$keyWord = '%'.$this->keyWord .'%';
						$promociones=Promocione::latest()					
						->orWhere('folio', 'LIKE', $keyWord)
						->orWhere('noexp', 'LIKE', $keyWord)
						->paginate(10);
				

					return view('livewire.promociones.view', [
						
						'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
						'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
						'usuarios' => User::orderby('name','ASC')->get(),
						'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
						'licenciados' => User::orderby('name','ASC')->get(),
						'promociones' => $promociones,
					]);
			break;
			case "sga":
					
	
				$promociones=Promocione::latest()
						->where('empleados_id',auth()->user()->id)					
						->latest()
						->paginate(10);
				

					return view('livewire.promociones.view', [
						
						'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
						'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
						'usuarios' => User::orderby('name','ASC')->get(),
						'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
						'licenciados' => User::orderby('name','ASC')->get(),
						'promociones' => $promociones,
					]);
			break;
	
			case "coordinador":
				$users_id = User::role('auxiliar')->where('ponencias_id', auth()->user()->ponencias_id)->first();
				$keyWord = '%'.$this->keyWord .'%';
				if($keyWord==='%%')
				{
					$promociones=Promocione::latest()
					->where('empleados_id',$users_id->id)					
					->latest()
					->paginate(10);
				
				}
				else
					{
						$promociones=Promocione::latest()					
						->orWhere('folio', 'LIKE', $keyWord)->where('empleados_id',$users_id->id)
						->orWhere('noexp', 'LIKE', $keyWord)->where('empleados_id',$users_id->id) 
						->paginate(10);
					
					}

					return view('livewire.promociones.view', [
						
						'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
						'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
						'usuarios' => User::orderby('name','ASC')->get(),
						'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
						'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
						'promociones' => $promociones,
					]);



					
	            $users_id = User::role('auxiliar')->where('ponencias_id', auth()->user()->ponencias_id)->first();
				$promociones=promocione::where('empleados_id',$users_id->id)
				->orWhere('folio', 'LIKE', $keyWord)->where('licenciados_id', '=', auth()->user()->id)
				->orWhere('noexp', 'LIKE', $keyWord)->where('licenciados_id', '=', auth()->user()->id) 
				->paginate(10);
			

					return view('livewire.promociones.view', [
						
						'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
						'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
						'usuarios' => User::orderby('name','ASC')->get(),
						'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
						'licenciados' => User::where('ponencias_id', auth()->user()->ponencias_id)->orderby('name','ASC')->get(),
						'promociones' => $promociones,
					]);
			break;
				default:
						$promociones=Promocione::latest()
						->paginate(10);
						return view('livewire.promociones.view', [
							
							'tipodocumentos' => Tipodocumento::orderby('descripcion', 'ASC')->get(),
							'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
							'usuarios' => User::orderby('name','ASC')->get(),
							'ptipos' => Ptipo::orderby('descripcion', 'ASC')->get(),
							'promociones' => $promociones,
						]);
				break;
		}
			

    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->folio = null;
		$this->noexp = null;
		$this->fecha_recibido_op = null;
		$this->fecha_turnado = null;
		$this->promovente = null;
		$this->asunto = null;
		$this->fojas = null;
		$this->empleados_id = null;
		$this->ptipos_id = null;
    }

    public function store()
    {
        
		$this->validate([
		'folio' => 'required',
		'noexp' => 'required',
		'fecha_recibido_op' => 'required',
		//'fecha_turnado' => 'required',
		'promovente' => 'required',
		'asunto' => 'required',
		'fojas' => 'required',
		'empleados_id' => 'required',
		'ptipos_id' => 'required',
        ]);

        Promocione::create([ 
			'folio' => $this-> folio,
			'noexp' => $this-> noexp,
			'fecha_recibido_op' => $this-> fecha_recibido_op,
			//'fecha_turnado' => $this-> fecha_turnado,
			'promovente' => $this-> promovente,
			'asunto' => $this-> asunto,
			'fojas' => $this-> fojas,
			'empleados_id' => $this-> empleados_id,
			'ptipos_id' => $this-> ptipos_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Promocione Successfully created.');
    }

    public function edit($id)
    {
        $record = Promocione::findOrFail($id);
        $this->selected_id = $id; 
		$this->folio = $record-> folio;
		$this->noexp = $record-> noexp;
		$this->fecha_recibido_op = $record-> fecha_recibido_op;
		//$this->fecha_turnado = $record-> fecha_turnado;
		$this->promovente = $record-> promovente;
		$this->asunto = $record-> asunto;
		$this->fojas = $record-> fojas;
		$this->empleados_id = $record-> empleados_id;
    }

    public function update()
    {
        $this->validate([
		'folio' => 'required',
		'noexp' => 'required',
		'fecha_recibido_op' => 'required',
		//'fecha_turnado' => 'required',
		'promovente' => 'required',
		'asunto' => 'required',
		'fojas' => 'required',
		'empleados_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Promocione::find($this->selected_id);
            $record->update([ 
			'folio' => $this-> folio,
			'noexp' => $this-> noexp,
			'fecha_recibido_op' => $this-> fecha_recibido_op,
			//'fecha_turnado' => $this-> fecha_turnado,
			'promovente' => $this-> promovente,
			'asunto' => $this-> asunto,
			'fojas' => $this-> fojas,
			'empleados_id' => $this-> empleados_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Promocione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Promocione::where('id', $id)->delete();
        }
    }
	public function receive_aux($id)
    {
	
        if ($id) 
		{
            $record = Promocione::find($id);
			
            $record->fecha_turnado = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Promoción recibida satisfactoriamente.');
        }
    }
	public function receive_ins($id)
    {
	
        if ($id) 
		{
            $record = Promocione::find($id);
			
            $record->fecha_asignado = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Promoción recibida satisfactoriamente.');
        }
    }
	public function assign($id)
    {
	
        if ($id) 
		{
            $this->selected_id=$id;
        }
    }
	public function store_assign()
    {
        if ($this->selected_id) 
		{
            $record = Promocione::find($this->selected_id);
			$record->licenciados_id = $this->licenciados_id;
            //$record->fecha_asignado = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Promoción asignada satisfactoriamente.');
        }
    }
	public function accord($id)
    {
	   
        if ($id) 
		{
            $record = Promocione::find($id);
            $record->fecha_acuerdo = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Promoción acordada satisfactoriamente.');
        }
    }
	public function attach($id)
    {
        $record = Promocione::findOrFail($id);
        $this->selected_id = $id; 

    }
    public function save()
    {
        $this->validate(
            [
                'archivos.*' => 'required|mimes:pdf',
            ]);
       // dd($this->archivos);
        foreach($this->archivos as $key=>$file)
        {
            $promocion=promocione::find($this->selected_id);
            $folio=$promocion->folio;
			$year=carbon::parse(now())->format('Y');
            $file_save=new Archivo();
            $file_save->file_name=$file->getClientOriginalName();
            $file_save->file_extension=$file->extension();
            $path=$file->store('promociones');			
			$file_save->file_path='storage/'.$path;
			$file_save->promociones_id= $this->selected_id;
			$file_save->usuarios_id= auth()->user()->id;
            $file_save->save();
            /*$record=Document::findOrFail($this->selected_id);
            $record->archivos_id=Archivo::max('id');
            $record->save();*/
            $archivo_id=Archivo::find(Archivo::max('id'))->id;
            if($archivo_id)
            {
                $file_assign=new Afile();
                $file_assign->archivos_id= Archivo::max('id');
                $file_assign->promociones_id= $this->selected_id;
                $file_assign->users_id=auth()->user()->id;
                $file_assign->save();

				$promocion->archivos_id= $archivo_id;
				$promocion->users_id= auth()->user()->id;
				$promocion->save(); 
                
				$this->archivos=null;
            }
            else
            {
            session()->flash('message', 'ERROR !! Archivo No adjuntado .');
            return redirect()->route('promociones.index');
            
            $this->archivos=null;

            }

        }    
        session()->flash('message', 'Archivo adjuntado correctamente.');
        return redirect()->route('promociones.index');
        
    }
	public function create_cell($id)
    {
	
        if ($id) 
		{
            $this->selected_id=$id;
			$this->promo_id=$id;
        }
    }
	public function store_cell()
    {
	
		//dd($this-> cantidad, $this-> fojas_cedula, $this-> selected_id, $this-> tipodocumentos_id);

		$this->validate([
			'fojas_cedula' => 'required',
			'cantidad' => 'required',
			'tipodocumentos_id' => 'required',
			]);
	
			Asignadocumento::create([ 
				'cantidad' => $this-> cantidad,
				'fojas' => $this-> fojas_cedula,
				'promociones_id' => $this-> selected_id,
				'tipodocumentos_id' => $this-> tipodocumentos_id,
				
			]);
			
			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Cédula Successfully created.');
	}
	public function migrate_afile()
	{
		//$afiles=Afile::all();
		$archivo=Promocione::all();
		foreach($archivo as $record)
			{
				$afile=Afile::where('archivos_id', $record->id)->first();
				$record->promociones_id= $afile->promociones_id;
				$record->usuarios_id= $afile->users_id;
				$record->save();

			}
	}
}

