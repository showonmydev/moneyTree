@extends('Master.AdminMaster')


@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>
                            Life Card List
                            <a href="#createJobsModal" id="CreateNewJob" style="color: black">
                                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                    <ul class="list-group" id="adminJobList">
                        @foreach($allJobs as $job)
                            <a href="#createJobsModal" class="list-group-item jobItem" JobID = {{$job->id}} description="{{$job->description}}">
                                {{$job->title}}
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include("Partials.CreateJobModal")
@endsection