<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    protected $fillable = [
        'branch_id',
        'title',
        'content',
        'publish_date',
        'expire_date',
        'target',
        'status',
        'created_by',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expire_date' => 'date',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}