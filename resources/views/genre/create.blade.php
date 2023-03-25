@extends('layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<div>
    <h1>ajouter un genre</h1>
<form action="{{url('genre')}}" method="post">
    {!!csrf_field()!!}
  <div class="form-group">
    <label for="exampleFormControlInput1">name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="....">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">description</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="description" placeholder="....">
  </div>

  
  <button class="btn " >save</buttn>
</form>
</div>
@endsection