@extends('Master.AdminMaster')


@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>
                            TreeVia List
                            <a href="#createTreviaModal" id="CreateNewTreevia" style="color: black">
                                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                    <ul class="list-group" id="adminTriviaList">
                        @foreach($allTreeVia as $treeVia)
                            <a href="#createTreviaModal" class="list-group-item TreeViaItem" TreeViaID = {{$treeVia->id}} options = "{{$treeVia->answers}}" correct = "{{$treeVia->correct}}" question="{{$treeVia->question}}" category = "{{$treeVia->categories_id}}">
                                {{$treeVia->question}}
                                <span class="badge" style="color: white; background-color: #2bbdaf" >{{$treeVia->categories->name}}</span>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include("Partials.CreateTreviaModal",['allCategory' =>$allCategory])
@endsection