<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amtipo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'amtipos';

    protected $fillable = ['descripcion'];
	
}
