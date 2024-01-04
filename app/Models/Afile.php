<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promocione;
use App\Models\Archivo;
use App\Models\User;

class Afile extends Model
{
    use HasFactory;
    protected $paginationTheme = 'bootstrap';

    //protected $perPage = 20;
    
    public $timestamps = true;

    protected $table = 'afiles';

    protected $fillable = ['promociones_id',' archivos_id', 'users_id'];


      public function promociones()
    {

        return $this->HasOne(Promocione::class,'id','asignaactuaciones_id');

    }
    public function archivos()
    {

        return $this->HasOne(Archivo::class,'id','archivos_id');

    }
      public function users()
    {

        return $this->HasOne(User::class,'id','users_id');

    }
}
