<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';

    protected $fillable = [
        'session_id',
        'desc',

    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
