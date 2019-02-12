<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $table = 'examinations';

    protected $fillable = [
        'title',
        'desc',
        'session_id',
        'user_id'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
