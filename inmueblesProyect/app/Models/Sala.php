<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use HasFactory, SoftDeletes;
    use CrudTrait;

    protected $table = 'salas';

    protected $primaryKey = 'sala_id';

    protected $fillable = [
        'sect_id',
        'stip_id',
        'depe_id',
        'sala_descripcion',
        'sala_direccion',
        'sala_capacidad',
    ];

    public function salaTipo()
    {
        return $this->belongsTo(SalaTipo::class, 'stip_id', 'stip_id'); // Assuming stip_id is the foreign key
    }

    // Other relationships
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sect_id', 'sect_id'); // Adjust accordingly
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'depe_id', 'depe_id'); // Adjust accordingly
    }


}
