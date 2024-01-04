<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignaactuacione;
use App\Models\Promocione;
use App\Models\User;
class archivo extends Model
{
    use HasFactory;
   
    public $timestamps = true;

    protected $table = 'archivos';

    protected $fillable = ['file_name','file_extension','file_path',' asignaactuaciones_id', 'promociones_id', 'usuarios_id'];

      public function asignaactuaciones()
    {

        return $this->HasOne(Asignaactuacione::class,'id','asignaactuaciones_id');

    }

}
