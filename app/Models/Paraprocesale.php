<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;
use App\Models\Tarea;

class Paraprocesale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paraprocesales';

    protected $fillable = ['noexp','year','actor','demandado','acciones_id','fecha_recepcion','observaciones','ponencias_id', 'observaciones_revision', 'tareas_id', 'revisado'];
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
