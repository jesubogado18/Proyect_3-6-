<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BienesSubTipo extends Model
{
    use HasFactory, SoftDeletes;
    use CrudTrait;

    
    protected $table = 'bienes_sub_tipo';

    // Define la clave primaria
    protected $primaryKey = 'bsti_id';


   
    protected $fillable = [
        'bsti_descripcion',
        'bsti_detalle',
    ];

    public function salas()
    {
        return $this->hasMany(Sala::class, 'bsti_id', 'bsti_id');
    }

}