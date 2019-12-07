<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use Notifiable;

    protected $table = 'departamentos'; /* Nombre de Tabla */
    protected $primaryKey = 'Id'; /* Llave Primaria */
    public $incrementing = false; /* ID Incremento */

    /* Campos */
    protected $fillable = [
        'Departamento', 'Descripcion'
    ];
}
