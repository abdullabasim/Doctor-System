<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    protected $fillable = [
        'name',
        'age',
        'mobile',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function session()
    {
        return $this->hasMany(Session::class, 'patient', 'id');
    }
}
