@extends('Master.index')

@section('body')
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Category Name : {{$allTriva->first()->categories->name}}</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    @foreach($allTriva as $T)
                        <div class="col s2">
                            <div class="card blue-grey TrivaCard" id = '{{$T->id}}' style="text-align: center;">
                                <a  class = "modal-trigger  waves-light " href="#modal2">
                                    <div class="card-content white-text">
                                        <spam class="treeviaElement">{{$loop->index + 1}}</spam>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    @include('Partials.trivaAnswerModal')
    @include('Partials.trivaQuestionModal')
@endsection
