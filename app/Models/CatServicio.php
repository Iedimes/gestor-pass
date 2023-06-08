<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatServicio extends Model
{
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
        return url('/admin/cat-servicios/'.$this->getKey());
    }
}
