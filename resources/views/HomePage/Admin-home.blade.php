@extends('Master.AdminMaster')


@section('body')
<div class="container">
    <div class="row">

        <div class="col s4 m3">

            <div class="card">
                <div class="card-image">
                    <a class="modal-trigger waves-effect" href="/manageAccount">
                        <img src="img/Account.png">
                    </a>
                </div>
            </div>

        </div>

        <div class="col s4 m3">

            <div class="card">
                <div class="card-image">
                    <a href="/manageTreeVia">
                        <img src="img/TreeVia.png">
                    </a>
                </div>
            </div>
        </div>

        <div class="col s4 m3">

            <div class="card">
                <div class="card-image">
                    <a href="/manageLifecard">
                        <img src="img/LifeCard.png">
                    </a>
                </div>
            </div>
        </div>

        <div class="col s4 m3">

            <div class="card">
                <div class="card-image">
                    <a href="/manageJobs">
                        <img src="img/Jobs.png">
                    </a>
                </div>
            </div>
        </div>

        <div class="col s4 m3">

            <div class="card">
                <div class="card-image">
                    <a href="#">
                        <img src="img/Food.png">
                    </a>
                </div>
            </div>
        </div>

        <div class="col s4 m3">

            <div class="card">
                <div class="card-image">
                    <a href="/manageTreeVia">
                        <img src="img/cat.png">
                    </a>
                </div>
            </div>
        </div>


    </div>


</div>
@endsection
