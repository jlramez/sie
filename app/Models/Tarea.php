<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etapa;

class Tarea extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tareas';

    protected $fillable = ['descripcion','etapas_id'];
    public function etapas()
    {
        return $this->hasOne(Etapa::class, 'id', 'etapas_id');
    }
	
}
