<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    protected $fillable = [
        'year_name',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (AcademicYear $year): void {
            if (! $year->is_active) {
                return;
            }

            static::withoutEvents(function () use ($year): void {
                static::query()
                    ->when(
                        $year->exists,
                        fn (Builder $query) => $query->whereKeyNot($year->getKey())
                    )
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            });
        });
    }

    public function studentPromotions(): HasMany
    {
        return $this->hasMany(StudentPromotion::class);
    }

    public function teacherSubjectAssigns(): HasMany
    {
        return $this->hasMany(TeacherSubjectAssign::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }

    public function studentFees(): HasMany
    {
        return $this->hasMany(StudentFee::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
