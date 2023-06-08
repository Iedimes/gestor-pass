<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatInformacione extends Model
{
    protected $fillable = [
        'credenciales_id',
        'tipo_debd_id',
        'tipo_debd',
        'nombredebd',
        'versiones',
        'ssl',
        'fecha_vec_dominio',
        'fecha_vec_ssl',

    ];


    protected $dates = [
        'fecha_vec_dominio',
        'fecha_vec_ssl',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    protected $with = ['tipodebd'];


    public function tipodebd()
    {
        return $this->belongsTo('App\Models\TipoDebd','tipo_debd_id','id');

    }


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cat-informaciones/'.$this->getKey());
    }
}
