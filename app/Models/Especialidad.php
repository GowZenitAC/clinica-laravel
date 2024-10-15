<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidades';
    public $timestamps = false;
    protected $fillable = ['id','nombre'];

    public function pacientes(){
        return $this->hasMany(Paciente::class, 'id');
    }

    public function usuarios(){
        return $this->hasOne(User::class, 'especialidad');
    }

    public static function especialidadUser(){
        $usuario = auth()->user();
        $especialidad = $usuario->especialidad_id;
        return self::find($especialidad);
    }
}
