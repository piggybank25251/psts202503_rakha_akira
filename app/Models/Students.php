<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'email',
        'phone',
        'grade',
    ];
}
