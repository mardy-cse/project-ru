<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Training extends Model
{
    protected $table = 'training';
    protected $fillable = [
        'name',
        'training_category_id',
        'training_overview',
        'course_qualification',
        'training_objective',
        'training_outline',
        'course_thumbnail',
        'status',
        'created_by',
        'updated_by',
    ];

    public $timestamps = true;
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
