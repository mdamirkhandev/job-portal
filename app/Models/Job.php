<?php

namespace App\Models;

use App\Models\JobType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
