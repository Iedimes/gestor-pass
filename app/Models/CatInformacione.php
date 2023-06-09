<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatInformacione extends Model
{
    protected $fillable = [
        'credenciales_id',
        'tipo_debd_id',
        'nombredebd',
        'versiones',
        'ssl',
        'fecha_vec_dominio',
        'fecha_vec_ssl',
        'tipo_servicios_id'

    ];


    protected $dates = [
        'fecha_vec_dominio',
        'fecha_vec_ssl',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    protected $with = ['tipo_debd', 'credenciales', 'tipo_servicios'];


    public function tipo_debd()
    {
        return $this->belongsTo('App\Models\TipoDebd','tipo_debd_id','id');

    }

    public function credenciales()
    {
        return $this->belongsTo('App\Models\Credenciale','credenciales_id','id');

    }

    public function tipo_servicios()
    {
        return $this->belongsTo('App\Models\TipoServicio','tipo_servicios_id','id');

    }


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cat-informaciones/'.$this->getKey());
    }
}
