<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'branch_id',
        'student_parent_id',
        'student_code',
        'name',
        'father_name',
        'grandfather_name',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'photo',
        'admission_date',
        'status',
        'description',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'admission_date' => 'date',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(StudentParent::class);
    }
}