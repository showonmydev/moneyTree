@extends('Master.AdminMaster')


@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>
                            Life Card List
                            <a href="#createlifeCardModal" id="CreateNewCard" style="color: black">
                                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                    <ul class="list-group" id="adminCardList">
                        @foreach($allCards as $card)
                            <a href="#createlifeCardModal" class="list-group-item createCard" cardid = {{$card->id}}>
                                {{$card->Question}}
                            </a>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include("Partials.CreateLifeCardModal")
@endsection