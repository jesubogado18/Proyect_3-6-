<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Piso extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $table = 'pisos';
    protected $primaryKey = 'piso_id';

    protected $fillable = ['edif_id', 'piso_descripcion', 'piso_direccion'];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class, 'edif_id');
    }

    public function sectores()
    {
        return $this->hasMany(Sector::class, 'piso_id');
    }
}
