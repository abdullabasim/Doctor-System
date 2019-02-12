<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';

    protected $fillable = [
        'title',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
