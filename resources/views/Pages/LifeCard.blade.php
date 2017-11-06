@extends('Master.index')


@section('body')

<div class="row">

    <div class="col s4 offset-s5">
        <a class="waves-effect waves-light btn shuffle"><i class="left">Shuffle</i></a>
    </div>
</div>

<div class="container">
    <div class="row">

        @foreach($allCards as $card)
            <div class="col s2">
                <div class="card blue-grey lifecard " id="{{$card->id}}">
                    <a  class = "modal-trigger  waves-light " href="#modal2">
                        <div class="card-content white-text">
                            <p class="treeviaElement">{{$loop->index + 1}}</p>
                        </div>
                    </a>

                </div>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col s4 offset-s6">
            <a href = "#" id="lifeCardSubmitBtn" class="btn-floating btn-large waves-effect waves-light green go disabled" ><i class="material-icons">GO</i></a>

        </div>
    </div>
</div>

@include('Partials.lifecardModal')
@endsection

