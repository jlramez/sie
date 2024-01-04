<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'etapas';

    protected $fillable = ['descripcion'];
	
}
