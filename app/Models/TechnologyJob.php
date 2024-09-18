<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TechnologyJob extends Model
{
    use HasFactory;
    protected $fillable=['technology_id','job_post_id'];
   /* public function jobPost(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobPost::class,'job_post_id');
    }
    public function technology(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Technology::class,'technology_id');
    }*/

}
