<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipodocumento;
use App\Models\Promocione;

class Asignadocumento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'asignadocumentos';

    protected $fillable = ['cantidad','fojas','promociones_id','documento'];
    public function documentos()
    {
        return $this->hasOne(Tipodocumento::class, 'id', 'tipodocumentos_id');
    }
    public function promociones()
    {
        return $this->hasOne(Promocione::class, 'id', 'promociones_id');
    }
    public function tipodocumentos()
    {
        return $this->hasOne(Tipodocumento::class, 'id', 'tipodocumentos_id');
    }
}
	

