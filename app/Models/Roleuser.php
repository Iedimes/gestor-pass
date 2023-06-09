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
    protected $with = ['role','adminuser'];


    public function role()
    {
        return $this->belongsTo('App\Models\Role');

    }


      public function adminuser()
    {
        return $this->belongsTo('App\Models\AdminUser','admin_users_id','id');

    }


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/roleusers/'.$this->getKey());
    }
}
