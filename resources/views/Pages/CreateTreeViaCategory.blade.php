@extends('Master.AdminMaster')


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        TreeVia List
                        <a href="#createTreeViaCategoryModal" id="CreateNewTreeviaCategory" style="color: black">
                            <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                        </a>
                    </p>
                </div>
                <ul class="list-group" id="adminTreeViaCategoryList">
                    @foreach($allCategory as $cat)
                    <a href="#createTreeViaCategoryModal" class="list-group-item TreeViaCategoryItem" CategoryID = "{{$cat->id}}">
                        {{$cat->name}}
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@include("Partials.CreateTreeViaCategoryModal",['allCategory' =>$allCategory])
@endsection