<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipodocumentos';

    protected $fillable = ['descripcion'];
	
}
