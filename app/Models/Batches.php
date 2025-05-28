<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Batches extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'batches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_id',
        'name',
        'speaker_name',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'class_duration',
        'seat_capacity',
        'number_of_sessions',
        'total_session_hours',
        'total_session_minutes',
        'enrollment_deadline',
        'expected_start_date',
        'venue',
        'session_day',
        'batch_status',
        'visible_platform',
        'publication_status',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'enrollment_deadline' => 'date',
        'expected_start_date' => 'date',
        'batch_status' => 'integer',
        'publication_status' => 'integer'
    ];

    /**
     * Get the training associated with this batch.
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }

    /**
     * Get the creator of this batch.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the last updater of this batch.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Scope a query to only include active batches.
     */
    public function scopeActive($query)
    {
        return $query->where('batch_status', 1);
    }

    /**
     * Scope a query to only include published batches.
     */
    public function scopePublished($query)
    {
        return $query->where('publication_status', 1);
    }
}