<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expediente;
use App\Models\Actuacione;

class Asignaactuacione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'asignaactuaciones';

    protected $fillable = ['actuaciones_id','expedientes_id','fecha_actuacion','autorizado','fecha_publicacion'];

    public function expedientes()
    {
    return $this->hasOne(Expediente::class, 'id', 'expedientes_id');
    }
    public function actuaciones()
    {
    return $this->hasOne(Actuacione::class, 'id', 'actuaciones_id');
    }
	
}
