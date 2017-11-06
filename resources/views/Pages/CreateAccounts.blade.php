@extends('Master.AdminMaster')


@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>
                            Users List
                            <a href="#createAccountModal" id="CreateNewUser" style="color: black">
                                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                    <ul class="list-group" id="adminUserList">
                        @foreach($allCards as $card)
                            <a href="#createAccountModal" class="list-group-item userItem" UserID = {{$card->id}} UserName={{$card->userName}} name={{$card->name}} password={{$card->password}}>
                                {{$card->userName}}
                            </a>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include("Partials.CreateAccountModal")
@endsection