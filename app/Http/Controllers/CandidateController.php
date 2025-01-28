<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Employee;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function one()
    {
        $candidates = Candidate::with('profile')->get();
        return view('onetoone', compact('candidates'));
    }
    public function many(){
        $employees = Employee::with('jobApplications')->get();
        $jobApplications = JobApplication::with('job')->get();
        return view('onetomany', compact('employees'));
    }
    public function manytomany(){
        $candidates = Candidate::with('jobApplications')->get();
        $jobApplications = JobApplication::with('job')->get();
        return view('manytomany', compact('candidates'));

    }


}
