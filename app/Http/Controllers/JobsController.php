<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $allJobs = Jobs::all();
        return view('Pages.jobs',['allJobs' => $allJobs]);
    }
    public  function adminShow()
    {
        $allJobs = Jobs::all();
        return view('Pages.CreateJobs',['allJobs' => $allJobs]);
    }
    public function store(Request $r)
    {
        if($r->ajax())
        {
            $jobs = new Jobs();
            $jobs->title = $r->title;
            $jobs->description = $r->description;
            $jobs->save();
            $allJobs = Jobs::all();
            return response($allJobs);
        }
    }
    public function update(Request $r, Jobs $jobs)
    {
        if($r->ajax())
        {
            $jobs->title = $r->title;
            $jobs->description = $r->description;
            $jobs->save();
            $allJobs = Jobs::all();
            return response($allJobs);
        }
    }
    public function delete(Request $r, Jobs $jobs)
    {
        if($r->ajax())
        {

            $jobs->delete();
            $allJobs = Jobs::all();
            return response($allJobs);
      }
    }
}
