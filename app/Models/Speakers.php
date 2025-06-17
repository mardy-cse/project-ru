<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'exparties_categories_id',
    ];

    protected $casts = [
        // If you are using these:
        // 'expertise' => 'array',
        // 'experience_years' => 'integer',
        // 'total_projects' => 'integer',
        'exparties_categories_id' => 'array',
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

    public function speaker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

 // Speaker.php (Model)
public function getExpartiesCategoriesNamesAttribute()
{
    $ids = $this->exparties_categories_id; // This is assumed to be an array

    return \App\Models\TrainingCategory::whereIn('id', $ids)->pluck('name')->toArray();
}

}
