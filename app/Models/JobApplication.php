<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    public function candidates()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
    public function job()
    {
        return $this->belongsTo(JobList::class, 'job_id');
    }
    public function candidatesmany()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_job_application', 'job_application_id', 'candidate_id');
    }

}
