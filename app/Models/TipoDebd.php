<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDebd extends Model
{
    protected $table = 'tipo_debd';

    protected $fillable = [
        'nombre',
        'version',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tipo-debds/'.$this->getKey());
    }
}
