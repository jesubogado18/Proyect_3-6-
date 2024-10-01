<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoBien extends Model
{
    use CrudTrait;
    use SoftDeletes;

    protected $table = 'bienes_tipos';
    protected $primaryKey = 'btip_id';

    protected $fillable = [
        'bsti_id',
        'btip_descripcion',
        'btip_detalle',
        'btip_costo'
    ];

    /**
     * Relación con el modelo relacionado (si es necesario).
     * Puedes agregar relaciones como belongsTo o hasMany si `bsti_id` se relaciona con otro modelo.
     */
    public function BienesSubTipo()
    {
        
        return $this->belongsTo(BienesSubTipo::class, 'bsti_id');
    }
}
