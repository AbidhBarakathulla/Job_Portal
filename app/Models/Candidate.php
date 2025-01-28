<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->hasOne(CandidateProfile::class,'candidate_id');
    }
   
    public function jobApplications()
    {
        return $this->belongsToMany(JobApplication::class, 'candidate_job_application', 'candidate_id', 'job_application_id');
    }
}
