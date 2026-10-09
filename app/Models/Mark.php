<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mark extends Model
{
    protected $fillable = [
        'exam_id',
        'student_id',
        'subject_id',
        'written_marks',
        'activity_marks',
        'homework_marks',
        'total_marks',
        'is_passed',
    ];

    protected function casts(): array
    {
        return [
            'written_marks' => 'decimal:2',
            'activity_marks' => 'decimal:2',
            'homework_marks' => 'decimal:2',
            'total_marks' => 'decimal:2',
            'is_passed' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Mark $mark): void {
            $mark->total_marks = number_format(
                (float) $mark->written_marks
                    + (float) $mark->activity_marks
                    + (float) $mark->homework_marks,
                2,
                '.',
                ''
            );
        });
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
