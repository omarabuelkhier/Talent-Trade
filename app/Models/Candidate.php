<?php

namespace App\Models;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Candidate extends Model
{

    use HasFactory;
    protected $fillable = ['user_id', 'about', 'cv','title','location','education','phone'];
    
    public function technology(){
        return $this->belongsToMany(Technology::class,'candidate_technologies');
    }

 
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}