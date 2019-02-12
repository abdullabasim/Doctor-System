<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JulpharMedical extends Model
{
    protected $table = 'julphar_medical';

    protected $fillable = [
        'title',
        'desc',
    ];
}
