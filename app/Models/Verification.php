<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
        'admin_users_id',
        'password',

    ];

    protected $hidden = [
        'password',

    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['user'];

    /* ************************ ACCESSOR ************************* */

    public function user()
    {
        return $this->belongsTo('App\Models\AdminUser','admin_users_id', 'id');

    }


    public function getResourceUrlAttribute()
    {
        return url('/admin/verifications/'.$this->getKey());
    }
}
