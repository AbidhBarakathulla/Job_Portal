<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Employee;
use App\Models\JobApplication;
use App\Models\JobList;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function one()   
    {
        $candidates = Candidate::with('profile')->get();
        return view('onetoone', compact('candidates'));
    } //controller function for one to one relationship

    public function many(){  
        $employees = Employee::with('jobApplications')->get();
        $jobApplications = JobApplication::with('jobLists')->get();
        return view('onetomany', compact('employees'));
    }   //controller function for one to many relationship

    public function manytomany(){ 
        $candidates = Candidate::with('jobApplications')->get();
        $jobApplications = JobApplication::with('jobLists')->get();
        return view('manytomany', compact('candidates'));
    }//controller function for many to many relationship

    public function hasonethrough(){
        $candidates = Candidate::with('employee')->get();
        return view('hasone', compact('candidates'));
    }//controller function for has one through relationship

    public function hasmanythrough(){
        $candidates = Candidate::with('jobLists')->get();
        return view('hasmany', compact('candidates'));
    } //controller function for has many through relationship

    public function polymorphic_one(){
        $candidates = Candidate::with('resume')->get();
        return view('polymorphic_one', compact('candidates'));
    } //controller function for polymorphic one to one relationship

    public function polymorphic_onetomany(){
        $candidates = Candidate::with('resumes')->get();
        return view('polymorphic_onetomany', compact('candidates'));
    } //controller function for polymorphic one to many relationship


    // public function insert(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'location' => 'required',
    //         'salary' => 'required',
    //         'image' => 'required',
    //         'company_name' => 'required',
         
    //     ]);
    //     $register=new JobList();
    //     $register->title = $request->title;
    //     $register->description = $request->description;
    //     $register->location =  $request->location;
    //     $register->salary =  $request->salary;
    //     $register->company_name =  $request->company_name;
    //     if ($request->hasFile('image')) {
    //         $imageName = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('Assets'), $imageName);
    //         $register->image = 'Assets/'.$imageName;
    //         }
         
     
    //     $register->save();
    
    //     return redirect()->route('/onetoone',compact('register'));
    // }

}
