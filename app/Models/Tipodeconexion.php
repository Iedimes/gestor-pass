<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipodeconexion extends Model
{
    protected $table = 'tipodeconexion';

    protected $fillable = [
        'nombre',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tipodeconexions/'.$this->getKey());
    }
}
