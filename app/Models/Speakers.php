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
        'profile_image',
        'gender',
        'organization',
        'signature',
        'status',
        'link',
    ];

    protected $casts = [
        // If you are using these:
        // 'expertise' => 'array',
        // 'experience_years' => 'integer',
        // 'total_projects' => 'integer',
    ];

    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }
        return 'https://via.placeholder.com/70x70?text=Photo';
    }

    public function getSignatureUrlAttribute()
    {
        if ($this->signature) {
            return asset('storage/' . $this->signature);
        }
        return 'https://via.placeholder.com/80x40?text=Sign';
    }
}
