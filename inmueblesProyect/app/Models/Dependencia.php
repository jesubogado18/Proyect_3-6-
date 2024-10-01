<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependencia extends Model
{
    use HasFactory, SoftDeletes;
    use CrudTrait;

    protected $table = 'dependencias';

    protected $primaryKey = 'depe_id';

    protected $fillable = [
        'depe_descripcion',
        'depe_telefono',
    ];


}
