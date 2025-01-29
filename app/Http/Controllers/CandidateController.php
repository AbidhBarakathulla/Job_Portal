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
        $jobApplications = JobApplication::with('jobLists')->get();
        return view('onetomany', compact('employees'));
    }
    public function manytomany(){
        $candidates = Candidate::with('jobApplications')->get();
        $jobApplications = JobApplication::with('jobLists')->get();
        return view('manytomany', compact('candidates'));
    }
    public function hasonethrough(){
        $candidates = Candidate::with('employee')->get();
        return view('hasone', compact('candidates'));
    }
    public function hasmanythrough(){
        $candidates = Candidate::with('jobLists')->get();
        return view('hasmany', compact('candidates'));
    }
    public function polymorphic_one(){
        $candidates = Candidate::with('resume')->get();
        return view('polymorphic_one', compact('candidates'));
    }
    public function polymorphic_onetomany(){
        $candidates = Candidate::with('resumes')->get();
        return view('polymorphic_onetomany', compact('candidates'));
    }
    public function show(Request $request)
    {
        $userName = 'John Doe'; // This is just a placeholder

        return view('profile', compact('userName'));
    }

}
