<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'session';

    protected $fillable = [
        'patient_id',
        'diagnosis',
        'user_id',

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function prescription()
    {
        return $this->hasMany(Prescription::class, 'session_id', 'id');
    }

    public function examination()
    {
        return $this->hasMany(Examination::class, 'session_id', 'id');
    }
}
