<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Console\PruneBatchesCommand;

class TrainingParticipant extends Model
{
    use HasFactory;

    
    protected $table = 'ebs_training_participant';
    
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'designation',
        'organization',
        'team_id',
        'batch_id',
        'certificate_url',
        'is_training_completed',
        'status',
        'created_by',
        'updated_by'
    ];
    
    protected $casts = [
        'is_training_completed' => 'boolean',
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    // Relationships
    public function batch()
    {
        return $this->belongsTo(Batches::class, 'batch_id');
    }
    
    // public function team()
    // {
    //     return $this->belongsTo(Team::class, 'team_id');
    // }
    
    // Accessor for status text
    public function getStatusTextAttribute()
    {
        return $this->status ? 'Approved' : 'Not Approved';
    }
    
    // Scope for approved participants
    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }
    
    // Scope for not approved participants
    public function scopeNotApproved($query)
    {
        return $query->where('status', 0);
    }
    
    // Scope for completed training
    public function scopeTrainingCompleted($query)
    {
        return $query->where('is_training_completed', 1);
    }
}
