<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edificio extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $table = 'edificios';
    protected $primaryKey = 'edif_id';

    protected $fillable = ['edif_descripcion', 'edif_direccion'];

    public function pisos()
    {
        return $this->hasMany(Piso::class, 'edif_id');
    }
}
