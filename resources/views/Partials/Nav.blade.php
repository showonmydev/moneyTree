

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a class="modal-trigger" href="#modal1">Admin</a></li>
                <li><a href="/Jobs">Jobs</a></li>
                <li><a href="#TreeViaModal" id="TreeViaNav">Tree-Via</a></li>
                <li><a href="#FoodPointModal" id="FoodNav">Food</a></li>
                <li><a href="#">Store</a></li>
                <li><a href="/lifecard">Life Card</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LogOut</a></li>
            </ul>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </div>
    </div>
</nav>

