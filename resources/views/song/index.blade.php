
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

@extends('layout')

@section('content')
<div class="main">
<div class="container">
  <h2>Bienvenue</h2>
  
  <div class="row">
    @foreach($song as $song)
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="{{ asset('storage/images/'.$song->artist->image) }}" alt="{{ $song->artist->name }}">

          <div class="card-body">
            <h5 class="card-title">{{ $song->title }}</h5>
            <p class="card-text">{{ $song->artist->name }}</p>

            <audio controls>
              <audio src="{{ asset('storage/'.$song->audio_path) }}" type="audio/mpeg">
             
            </audio>

            <button class="btn btn-primary">Ajouter à la liste de lecture</button>
            <button class="btn btn-secondary">J'aime</button>
          </div>
        </div>
      </div>
    @endforeach
               
    <div><a href="{{ url('/song/' . $song->id ) }}" class="btn btn-secondary d-flex justify-content-start" style="margin-bottom:2px; width:40%;">Voir plus...</a></div>
  </div>
</div>
</div>
@endsection
