<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'genero',
        'diagnostico',
        'fecha_valoracion',
        'telefono',
        'direccion',
        'historial',
        'observaciones',
        'seguimiento',
        'id_especialidad'
    ];


    public function especialidades()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }

    public function agenda()
    {
        return $this->hasMany(Agenda::class, 'id_paciente');
    }

    public static function pacientesFilter(){
        $especialidad_user = auth()->user()->especialidad_id;
        return self::query()->where('id_especialidad', $especialidad_user)->get(); 
        
    }
}
