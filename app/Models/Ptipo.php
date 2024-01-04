<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptipo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ptipos';

    protected $fillable = ['descripcion'];
	
}
