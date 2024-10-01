<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaTipo extends Model
{
    use HasFactory, SoftDeletes;
    use CrudTrait;

    protected $table = 'salas_tipo';

    
    protected $primaryKey = 'stip_id';

   
    protected $fillable = ['stip_descripcion'];

    
    public function salas()
    {
        return $this->hasMany(Sala::class, 'stip_id', 'stip_id');
    }
}
