<?php

namespace App\Models;


use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;


    protected $table = 'proveedores';

    protected $primaryKey = 'prov_id';

  
    protected $fillable = [
        'prov_nombre',
        'prov_telefono',
        'prov_ruc',
        'prov_direccion',
        'prov_localidad',
    ];

    protected $dates = ['deleted_at'];


}
