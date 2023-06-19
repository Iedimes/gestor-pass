<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roleuser extends Model
{
    protected $fillable = [
        'admin_users_id',
        'role_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    // protected $with = ['role', 'nombre'];


    // public function role()
    // {
    //     return $this->belongsTo('App\Models\Role','role_id','id');

    // }
    // public function nombre()
    // {
    //     return $this->belongsTo('App\Models\AdminUser', 'admin_users_id', 'id');
    // }


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/roleusers/'.$this->getKey());
    }
}
