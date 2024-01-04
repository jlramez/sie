<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuacione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actuaciones';

    protected $fillable = ['descripcion','activo'];
	
}
