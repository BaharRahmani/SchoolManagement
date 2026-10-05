<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    protected $fillable = [
        'branch_id',
        'teacher_code',
        'name',
        'father_name',
        'gender',
        'phone',
        'email',
        'address',
        'qualification',
        'specialization',
        'hire_date',
        'salary',
        'photo',
        'status',
        'description',
    ];

    protected $casts = [
        'hire_date' => 'date',
        'salary' => 'decimal:2',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}