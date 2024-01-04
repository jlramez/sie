<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Ptipo;
use App\Models\Archivo;

class Promocione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'promociones';

    protected $fillable = ['folio','noexp','fecha_recibido_op','fecha_turnado','promovente','asunto','fojas','empleados_id', 'ptipos_id', 'archivos_id','users_id'];
    public function empleados()
    {
        return $this->hasOne(User::class, 'id', 'empleados_id');
    }
    public function licenciados()
    {
        return $this->hasOne(User::class, 'id', 'licenciados_id');
    }
    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function ptipos()
    {
        return $this->hasOne(Ptipo::class, 'id', 'ptipos_id');
    }
    public function archivos()
    {
        return $this->hasOne(Archivo::class, 'id', 'archivos_id');
    }
}
