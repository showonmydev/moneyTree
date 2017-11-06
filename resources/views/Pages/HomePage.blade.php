@extends('Master.index')


@section('body')

    <div class="container">
        <div class="row">




            <div class="col s4 m3">

                <div class="card">
                    <div class="card-image">
                        <a class="modal-trigger waves-effect" href="#modal1">
                            <img src="img/Admin.png">
                        </a>
                    </div>
                </div>

            </div>

            <div class="col s4 m3">

                <div class="card">
                    <div class="card-image">
                        <a href="#TreeViaModal" class="waves-effect waves-light " id ="TreeViaMenu">
                            <img src="img/TreeVia.png">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col s4 m3">

                <div class="card">
                    <div class="card-image">
                        <a href="/lifecard">
                            <img src="img/LifeCard.png">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col s4 m3">
                <div class="card">
                    <div class="card-image">
                        <a href="/Jobs">
                            <img src="img/Jobs.png">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col s4 m3">
                <div class="card">
                    <div class="card-image">
                        <a href="#FoodPointModal"id="FoodTile">
                            <img src="img/Food.png">
                        </a>
                    </div>
                </div>
            </div>

        </div>


    </div>



@endsection

