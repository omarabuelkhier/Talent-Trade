<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateTechnology extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_id', 'technology_id'];
   
}
