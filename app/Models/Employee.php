<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['company_name', 'location', 'logo', 'user_id'];
    use HasFactory;
    public function jobPosts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobPost::class, 'employee_id');
    }
}
