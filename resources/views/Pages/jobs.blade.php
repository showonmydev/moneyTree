@extends('Master.index')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col s6 offset-s2">
                <ul class="collapsible popout" data-collapsible="accordion">
                    @foreach($allJobs as $jobs)
                        <li style="margin-bottom: 20px;">
                            <div class="collapsible-header  blue lighten-5"><i class="material-icons">work</i>{{$jobs->title}} <span class="new badge" data-badge-caption="">{{$jobs->created_at->diffForHumans()}}</span></div>
                            <div class="collapsible-body">{{$jobs->description}}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection