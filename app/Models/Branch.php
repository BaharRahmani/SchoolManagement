<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'code',
        'adress',
        'phone',
        'manager_name',
        'status',
        'description'
    ];
}
