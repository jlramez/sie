<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Amparo;
use App\Models\Amtipo;
use App\Models\Juzgado;
use App\Models\Ponencia;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Archivo;
use App\Models\Afile;
use App\Models\User;
use carbon\carbon;

class Amparos extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $carpeta, $amtipos_id, $folio, $fecha_recibido_tjlb, $fecha_presidencia, $no_oficio, $j_exp, $fecha_ejecucion,
	 $expediente_tjlb, $resolutivo, $causa, $plazo, $multa, $fecha_vencimiento, $juzgados_id, $ponencias_id, $estados_id, $observaciones,
	 $archivo, $empleados_id, $fecha_turnado, $licenciados_id, $fecha_asignado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.amparos.view', [
			'estatus' => Estado::latest()->orderby('descripcion', 'ASC')->get(),
			'ponencias' => Ponencia::latest()->get(),
			'amtipos' => Amtipo::latest()->orderby('descripcion', 'ASC')->get(),
			'juzgados' => Juzgado::latest()->orderby('descripcion', 'ASC')->get(),
			'empleados' => Empleado::orderby('nombre', 'ASC')->get(),
			'usuarios' => User::role('amparos')->orderby('name', 'ASC')->get(),
			'licenciados' => User::orderby('name','ASC')->get(),

            'amparos' => Amparo::latest()
						->orWhere('carpeta', 'LIKE', $keyWord)
						->orWhere('amtipos_id', 'LIKE', $keyWord)
						->orWhere('folio', 'LIKE', $keyWord)
						->orWhere('fecha_recibido_tjlb', 'LIKE', $keyWord)
						->orWhere('fecha_presidencia', 'LIKE', $keyWord)
						->orWhere('no_oficio', 'LIKE', $keyWord)
						->orWhere('j_exp', 'LIKE', $keyWord)
						->orWhere('expediente_tjlb', 'LIKE', $keyWord)
						->orWhere('resolutivo', 'LIKE', $keyWord)
						->orWhere('causa', 'LIKE', $keyWord)
						->orWhere('plazo', 'LIKE', $keyWord)
						->orWhere('multa', 'LIKE', $keyWord)
						->orWhere('fecha_vencimiento', 'LIKE', $keyWord)
						->orWhere('juzgados_id', 'LIKE', $keyWord)
						->orWhere('ponencias_id', 'LIKE', $keyWord)
						->orWhere('estados_id', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->carpeta = null;
		$this->amtipos_id = null;
		$this->folio = null;
		$this->fecha_recibido_tjlb = null;
		$this->fecha_presidencia = null;
		$this->no_oficio = null;
		$this->j_exp = null;
		$this->expediente_tjlb = null;
		$this->resolutivo = null;
		$this->causa = null;
		$this->plazo = null;
		$this->multa = null;
		$this->fecha_vencimiento = null;
		$this->juzgados_id = null;
		$this->ponencias_id = null;
		$this->estados_id = null;
		$this->empleados_id;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'carpeta' => 'required',
		'amtipos_id' => 'required',
		'folio' => 'required',
		'fecha_recibido_tjlb' => 'required',
		'fecha_presidencia' => 'required',
		'no_oficio' => 'required',
		'j_exp' => 'required',
		'expediente_tjlb' => 'required',
		'resolutivo' => 'required',
		'causa' => 'required',
		'plazo' => 'required',
		'multa' => 'required',
		//'fecha_vencimiento' => 'required',
		'juzgados_id' => 'required',
		'ponencias_id' => 'required',
		'estados_id' => 'required',
		'empleados_id' => 'required',
		'observaciones' => 'required',
        ]);
        $vencimiento=carbon::parse($this->fecha_recibido_tjlb)->addDay($this->plazo)->toDateString();
        Amparo::create([ 
			'carpeta' => $this-> carpeta,
			'amtipos_id' => $this-> amtipos_id,
			'folio' => $this-> folio,
			'fecha_recibido_tjlb' => $this-> fecha_recibido_tjlb,
			'fecha_presidencia' => $this-> fecha_presidencia,
			'no_oficio' => $this-> no_oficio,
			'j_exp' => $this-> j_exp,
			'expediente_tjlb' => $this-> expediente_tjlb,
			'resolutivo' => $this-> resolutivo,
			'causa' => $this-> causa,
			'plazo' => $this-> plazo,
			'multa' => $this-> multa,
			'fecha_vencimiento' => $vencimiento,//ojo
			'juzgados_id' => $this-> juzgados_id,
			'ponencias_id' => $this-> ponencias_id,
			'estados_id' => $this-> estados_id,
			'empleados_id' => $this->empleados_id,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Amparo Successfully created.');
    }

    public function edit($id)
    {
        $record = Amparo::findOrFail($id);
        $this->selected_id = $id; 
		$this->carpeta = $record-> carpeta;
		$this->amtipos_id = $record-> amtipos_id;
		$this->folio = $record-> folio;
		$this->fecha_recibido_tjlb = $record-> fecha_recibido_tjlb;
		$this->fecha_presidencia = $record-> fecha_presidencia;
		$this->no_oficio = $record-> no_oficio;
		$this->j_exp = $record-> j_exp;
		$this->expediente_tjlb = $record-> expediente_tjlb;
		$this->resolutivo = $record-> resolutivo;
		$this->causa = $record-> causa;
		$this->plazo = $record-> plazo;
		$this->multa = $record-> multa;
		$this->fecha_vencimiento = $record-> fecha_vencimiento;
		$this->juzgados_id = $record-> juzgados_id;
		$this->ponencias_id = $record-> ponencias_id;
		$this->estados_id = $record-> estados_id;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'carpeta' => 'required',
		'amtipos_id' => 'required',
		'folio' => 'required',
		'fecha_recibido_tjlb' => 'required',
		'fecha_presidencia' => 'required',
		'no_oficio' => 'required',
		'j_exp' => 'required',
		'expediente_tjlb' => 'required',
		'resolutivo' => 'required',
		'causa' => 'required',
		'plazo' => 'required',
		'multa' => 'required',
		//'fecha_vencimiento' => 'required',
		'juzgados_id' => 'required',
		'ponencias_id' => 'required',
		'estados_id' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			if ($this->fecha_vencimiento)
				{
					$fecha_ven=$this->fecha_vencimiento;
				}
				else
					{
						$fecha_ven=carbon::parse(now());
					}
			$record = Amparo::find($this->selected_id);
            $record->update([ 
			'carpeta' => $this-> carpeta,
			'amtipos_id' => $this-> amtipos_id,
			'folio' => $this-> folio,
			'fecha_recibido_tjlb' => $this-> fecha_recibido_tjlb,
			'fecha_presidencia' => $this-> fecha_presidencia,
			'no_oficio' => $this-> no_oficio,
			'j_exp' => $this-> j_exp,
			'expediente_tjlb' => $this-> expediente_tjlb,
			'resolutivo' => $this-> resolutivo,
			'causa' => $this-> causa,
			'plazo' => $this-> plazo,
			'multa' => $this-> multa,
			'fecha_vencimiento' => $fecha_ven,
			'juzgados_id' => $this-> juzgados_id,
			'ponencias_id' => $this-> ponencias_id,
			'estados_id' => $this-> estados_id,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Amparo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Amparo::where('id', $id)->delete();
        }
    }
	public function execute($id)
    {
		$this->selected_id = $id; 
    }

	public function execute_store()
    {    
    $this->validate([
         'fecha_ejecucion' => 'date|nullable',
        ]);   
         
         if($this->selected_id)
         {
            $record = Amparo::findOrFail($this->selected_id);      
            $record->fecha_ejecucion=$this->fecha_ejecucion;
            $record->save();
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Fecha de ejecución asignada correctamente.');
        }
    }
	public function receive_aux($id)
    {
	
        if ($id) 
		{
            $record = Amparo::find($id);
			
            $record->fecha_turnado = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Amparo recibido satisfactoriamente.');
        }
    }
	public function attach($id)
    {
       
		$record = Amparo::findOrFail($id);
        $this->selected_id = $id; 

    }
	public function save()
    {
        $this->validate(
            [
                'archivo.*' => 'required|mimes:pdf',
            ]);
       // dd($this->archivos);
       // foreach($this->archivos as $key=>$file)
        //{
		if ($this->archivo)
			{	
					$amparo=amparo::find($this->selected_id);
					$folio=$amparo->folio;
					$year=carbon::parse(now())->format('Y');
					$file_save=new Archivo();
					$file_save->file_name=$this->archivo->getClientOriginalName();
					$file_save->file_extension=$this->archivo->extension();
					$path=$this->archivo->store('amparos/'.$year.'/'.$folio);			
					$file_save->file_path='storage/'.$path;
					$file_save->save();
					$archivo_id=Archivo::find(Archivo::max('id'))->id;
					//dd($archivo_id);
					if($archivo_id)
					{
						$amparo->archivos_id= $archivo_id;
						$amparo->users_id= auth()->user()->id;
						$amparo->save(); 

						  $file_assign=new Afile();
               			  $file_assign->archivos_id= Archivo::max('id');
                		  $file_assign->promociones_id= $this->selected_id;
              			  $file_assign->users_id=auth()->user()->id;
                          $file_assign->save();
						
						$this->archivo=null;
						session()->flash('message', 'Archivo adjuntado correctamente.');
						return redirect()->route('promociones.index');
					}
					else
					{
						session()->flash('message', 'ERROR !! Archivo No adjuntado .');
						return redirect()->route('promociones.index');
						
						$this->archivo=null;

					}
			}
			else
					{
						session()->flash('message', 'ERROR !! Archivo No adjuntado .');
						return redirect()->route('promociones.index');
						
						$this->archivo=null;

					}
    }
    public function save_og()
    {
      
		$this->validate(
            [
                'archivos.*' => 'required|mimes:pdf',
            ]);
       // dd($this->archivos);
        foreach($this->archivos as $key=>$file)
        {
            $amparo=Amparo::find($this->selected_id);
            $folio=$amparo->folio;
			$year=carbon::parse(now())->format('Y');
            $file_save=new Archivo();
            $file_save->file_name=$file->getClientOriginalName();
            $file_save->file_extension=$file->extension();
			$path=$file->store('amparos/'.$year.'/'.$folio);
			$file_save->file_path='storage/'.$path;
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

				$amparo->archivos_id= $archivo_id;
				$amparo->save(); 
                
				$this->archivos=null;
            }
            else
            {
            session()->flash('message', 'ERROR !! Archivo No adjuntado .');
            return redirect()->route('amparos.index');
            
            $this->archivos=null;

            }

        }    
        session()->flash('message', 'Archivo adjuntado correctamente.');
        return redirect()->route('amparos.index');
        
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
            $record = Amparo::find($this->selected_id);
			$record->licenciados_id = $this->licenciados_id;
            //$record->fecha_asignado = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Amparo asignado satisfactoriamente.');
        }
    }
	public function receive_ins($id)
    {
	
        if ($id) 
		{
            $record = Amparo::find($id);
			
            $record->fecha_asignado = carbon::parse(now());
			$record->save();
			
			session()->flash('message', 'Amparo recibido satisfactoriamente.');
        }
    }
}