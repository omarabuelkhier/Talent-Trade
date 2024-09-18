<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['technology_name'];
    
    public function candidate(){
        return $this->belongsToMany(Candidate::class,'candidate_technologies');
    }
    
    public function job_post(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(JobPost::class,'technology_jobs','job_post_id');
    }
}