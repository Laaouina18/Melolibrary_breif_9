@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<div class="container">
<h1 class="mb-4">Modifier un groupe</h1>
  <div class="row justify-content-center">
    <div class="col-md-6">
      
    <form action="{{ url('groupe/'.$groupe->id) }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    {{ method_field('PATCH') }}
        <div class="mb-3">
          <label for="name" class="form-label">Nom</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$groupe->name}}" placeholder="Entrez le nom du genre">
        </div>
        <div class="form-group">
            <label for="country">Pays</label>
            <input type="text" class="form-control" id="country" value="{{$groupe->pays}}" name="pays" placeholder="Pays d'origine">
        </div>
        <div class="form-group">
            <label for="birthday">Date de création</label>
            <input type="date" class="form-control" id="pays" value="{{$groupe->date_creation}}" name="date_creation">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">

          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" value="{{$groupe->description}}" id="description" name="description" placeholder="Entrez une description du genre">
        </div>
       
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </div>
</div>
@endsection
