<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servidore extends Model
{
    protected $fillable = [
        'ip',
        'puerto',
        'tipodeconexion_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/servidores/'.$this->getKey());
    }
}
