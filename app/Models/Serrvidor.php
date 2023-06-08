<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serrvidor extends Model
{
    protected $table = 'serrvidor';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/serrvidors/'.$this->getKey());
    }
}
