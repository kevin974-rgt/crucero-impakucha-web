<?php

namespace App\Models;

use CodeIgniter\Model;

class MensajeModel extends Model
{
    protected $table = 'mensajes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'correo',
        'telefono',
        'mensaje'
    ];
}