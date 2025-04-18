<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    protected $table = 'valoraciones';

    protected $fillable = [
        'id',
        'fecha',
        'paciente_id',
        'valoracion',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
