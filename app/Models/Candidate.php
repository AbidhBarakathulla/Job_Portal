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
    public function employee()
    {
        return $this->hasOneThrough(
            Employee::class,         // Final model (Employee)
            JobApplication::class,   // Intermediate model (JobApplication)
            'candidate_id',          // Foreign key on the job_application table
            'id',                    // Foreign key on the employee table
            'id',                    // Local key on the candidates table
            'emp_id'                 // Local key on the job_application table
        );
    } 
    public function jobLists()
{
    return $this->hasManyThrough(JobList::class, JobApplication::class, 'candidate_id', 'id', 'id', 'job_id');
}
public function resume()
{
    return $this->morphOne(CandidateResume::class, 'candidateable');
}
public function resumes()
{
    return $this->morphMany(CandidateResume::class, 'candidateable');
}

}
