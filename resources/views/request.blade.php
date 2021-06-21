@extends('layouts.navbar')
@section('content')
<style>
body {

  background-color:black;
}
h2{color :white;
  margin: auto;
  width: 30%;
  }
  .card-body{
    background-color: #333333;
    color:white;

  }
  .card-header{
    background-color:   #1a1a1a
;
    color:white;
  }

</style>
<h2> Request for sponsers</h2>
@foreach($startups as $startup) 
<div class="card m-4">

  <h5 class="card-header">{{$startup->client->username}}</h5>
  <div class="card-body">
    <h5 class="card-title ">{{$startup->projectName}}</h5>
    <div class="d-flex">
    <p class="card-text col-9">{{$startup->description}}</p>
    <div class=" p-3 col-3 m-1">
    <a href="{{route('SendMail')}}" class="btn btn-success m-2">Accept</a>
    <a href="" class="btn btn-danger">Refuse</a>
  </div>
  </div>

  </div>
</div>

@endforeach

@stop 