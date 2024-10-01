<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $table = 'sectores';
    protected $primaryKey = 'sect_id';

    protected $fillable = ['piso_id', 'sect_descripcion', 'sect_direccion'];


    public function piso()
    {
        return $this->belongsTo(Piso::class, 'piso_id');
    }
    
}
