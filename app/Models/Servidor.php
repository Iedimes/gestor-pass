<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $table = 'servidor';

    protected $fillable = [
        'grupo_id',
        'ip',
        'puerto',
        'tipodeconexion_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['grupo', 'tipodeconexion'];

    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');

    }

    public function tipodeconexion()
    {
        return $this->belongsTo('App\Models\Tipodeconexion');

    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/servidors/'.$this->getKey());
    }
}
