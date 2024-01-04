<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;
use App\Models\Tarea;

class Ordinario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ordinarios';

    protected $fillable = ['ponencias_id', 'observaciones_revision', 'tareas_id', 'revisado', 'noexp','year','actor','demandado','no_actores','actuaciones_id','tipos_id','estatus_id','original','duplicado','observaciones','acumulado','fecha_observacion','observaciones_colegiado'];
	public function actuaciones()
    {
        return $this->hasOne(Actuacione::class, 'id', 'actuaciones_id');
    }
    public function ponencias()
    {
        return $this->hasOne(Ponencia::class, 'id', 'ponencias_id');
    }
    public function tipos()
    {
        return $this->hasOne(Tipo::class, 'id', 'tipos_id');
    }
    public function tareas()
    {
        return $this->hasOne(Tarea::class, 'id', 'tareas_id');
    }
}
