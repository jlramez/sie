<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo;
use App\Models\Ponencia;
use App\Models\Actuacione;

class Expediente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'expedientes';

    protected $fillable = ['noexp','year','actor','demandado','no_actores','acciones_id','ponencias_id','estatus_id','original','duplicado','observaciones','acumulado','fecha_observacion','observaciones_colegiado'];
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
}
