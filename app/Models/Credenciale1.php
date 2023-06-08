<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credenciale extends Model
{
    protected $fillable = [
        'usuario',
        'contraseña',
        'enlace',
        'fecha',
        'servidor_id',
        'tipodeconexion_id',
        'estados_id',
        'grupo_id',
    
    ];
    
    
    protected $dates = [
        'fecha',
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/credenciales/'.$this->getKey());
    }
}
