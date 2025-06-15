<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ebs_training_attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_id',
        'batch_id',
        'session_id',
        'user_id',
        'participant_name',
        'participant_email',
        'participant_phone',
        'session_date',
        'venue',
        'session_day',
        'start_time',
        'end_time',
        'attendance_status',
        'remarks',
        'marked_by',
        'marked_at',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'session_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'marked_at' => 'datetime',
        'attendance_status' => 'integer'
    ];

    /**
     * Get the training associated with this attendance.
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    /**
     * Get the batch associated with this attendance.
     */
    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batches::class, 'batch_id');
    }

    /**
     * Get the session associated with this attendance.
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    /**
     * Get the user/participant associated with this attendance.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the person who marked this attendance.
     */
    public function marker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'marked_by');
    }

    /**
     * Get the creator of this attendance record.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the last updater of this attendance record.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Scope a query to only include present attendances.
     */
    public function scopePresent($query)
    {
        return $query->where('attendance_status', 1);
    }

    /**
     * Scope a query to only include absent attendances.
     */
    public function scopeAbsent($query)
    {
        return $query->where('attendance_status', 0);
    }

    /**
     * Scope a query to only include late attendances.
     */
    public function scopeLate($query)
    {
        return $query->where('attendance_status', 2);
    }

    /**
     * Scope a query to filter by specific date.
     */
    public function scopeByDate($query, $date)
    {
        return $query->whereDate('session_date', $date);
    }

    /**
     * Scope a query to filter by training.
     */
    public function scopeByTraining($query, $trainingId)
    {
        return $query->where('training_id', $trainingId);
    }

    /**
     * Scope a query to filter by batch.
     */
    public function scopeByBatch($query, $batchId)
    {
        return $query->where('batch_id', $batchId);
    }

    /**
     * Get attendance status as text.
     */
    public function getAttendanceStatusTextAttribute()
    {
        switch ($this->attendance_status) {
            case 1:
                return 'Present';
            case 0:
                return 'Absent';
            case 2:
                return 'Late';
            default:
                return 'Unknown';
        }
    }
}
