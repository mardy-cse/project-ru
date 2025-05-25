<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speakers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'experience_years',
        'total_projects',
        'status',
        'expertise',
        'bio',
        'profile_image'
    ];

    protected $casts = [
        'expertise' => 'array',
        'experience_years' => 'integer',
        'total_projects' => 'integer',
    ];

    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }
        return 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150';
    }
}
