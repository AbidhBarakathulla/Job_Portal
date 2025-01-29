<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    public function jobApplications()
{
    return $this->hasMany(JobApplication::class, 'job_id');
}
}
