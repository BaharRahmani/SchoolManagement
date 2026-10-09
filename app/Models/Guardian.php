<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guardian extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'phone',
        'alt_phone',
        'job',
        'address',
        'national_id_no',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
