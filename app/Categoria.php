<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categorias'; /* Nombre de Tabla */
    protected $primaryKey = 'Id'; /* Llave Primaria */
    public $incrementing = false; /* ID Incremento */

    protected $fillable = [
        'Categoria'
    ];
}
