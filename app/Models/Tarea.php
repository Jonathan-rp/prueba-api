<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'empresa_id',
        'user_id',
        'descripcion',
        'estatus',
        'fecha_inicio',
        'fecha_vencimiento'
    ];

   public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

   public function user() {
        return $this->belongsTo(User::class);
    }
}
