<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'emp_id');  
      }
}
