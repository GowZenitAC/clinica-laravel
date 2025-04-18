<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $table = 'historial_medico';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'paciente_id',
        'diagnostico',
        'historial',
        'observaciones',
        'seguimiento',
        'citas_a_tomar',
        'primera_valoracion',
        'fecha_alta',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
