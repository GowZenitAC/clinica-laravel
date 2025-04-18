<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionMedica extends Model
{
    use HasFactory;

    protected $table = 'informacion_medica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'paciente_id',
        'diagnostico',
        'historial',
        'primera_valoracion',
        'observaciones',
        'seguimiento',
        'citas_a_tomar'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    // public static function getInfoFiltered(){
    //     $especialidad_user = auth()->user()->especialidad_id;
    //     return self::query()->where('paciente_id', $especialidad_user)->get();
    // }
}
