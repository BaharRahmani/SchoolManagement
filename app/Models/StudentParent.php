<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'second_phone',
        'relationship',
        'occupation',
        'address',
    ];
}