<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    protected $fillable = [
        'student_id',
        'academic_year_id',
        'fee_type',
        'amount',
        'discount',
        'final_amount',
        'due_date',
        'status',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'discount' => 'decimal:2',
        'final_amount' => 'decimal:2',
        'due_date' => 'date',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}