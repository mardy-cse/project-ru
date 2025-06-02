<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class TrainingCategory extends Model{
    protected $table = 'ebs_training_category';
    protected $fillable = [
        'category_name',
        'created_by',
        'updated_by',
    ];

    public $timestamps = true; 

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function updater(){
        return $this->belongsTo(User::class,'updated_by');
    }
}

?>