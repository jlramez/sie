<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amtipo;
use App\Models\Ponencia;
use App\Models\Juzgado;
use App\Models\Estado;
use App\Models\User;
class Amparo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'amparos';

    protected $fillable = ['users_id', 'fecha_asignado', 'archivos_id', 'fecha_turnado', 'empleados_id', 'fecha_ejecucion', 'carpeta','amtipos_id','folio','fecha_recibido_tjlb',
    'fecha_presidencia','no_oficio','j_exp','expediente_tjlb','resolutivo','causa','plazo','multa','fecha_vencimiento','juzgados_id','ponencias_id','estados_id','observaciones'];
	
	public function amtipos()
    {
        return $this->hasOne(Amtipo::class, 'id', 'amtipos_id');
    }
    public function ponencias()
    {
        return $this->hasOne(Ponencia::class, 'id', 'ponencias_id');
    }
    public function juzgados()
    {
        return $this->hasOne(Juzgado::class, 'id', 'juzgados_id');
    }
    public function estados()
    {
        return $this->hasOne(Estado::class, 'id', 'estados_id');
    }
    public function empleados()
    {
        return $this->hasOne(User::class, 'id', 'empleados_id');
    }
    public function archivos()
    {
        return $this->hasOne(Archivo::class, 'id', 'archivos_id');
    }
}
