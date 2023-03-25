@extends('layout')
@section('content')
<h1>edit song</h1>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



<div>
    <h1>ajouter un artist</h1>
<form action="{{url('song/'.$song->id)}}" method="post">

    {!!csrf_field()!!}
    {{ method_field('PATCH') }}
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="$song->title" required maxlength="255">

    <label for="year">Year</label>
    <input type="number" name="year" id="year" value="$song->year" required min="1900">

    <label for="track">Track</label>
    <input type="text" name="track" id="track" value="$song->track"required maxlength="255">

    <label for="audio_path">Audio Path</label>
    <input type="file" name="audio_path" id="audio" value="$song->audio_path"  required>

    <label for="filename">Filename</label>
    <input type="text" name="filename" id="filename" value="$filename" required maxlength="255">

    <label for="duration">Duration</label>
    <input type="time" name="duration" id="duration" value="$duration" required>

    <label for="genre_id">Genre</label>
    <select name="genre_id" id="genre_id"  required>
        @foreach ($genre as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <label for="artist_id">Artist</label>
    <select name="artist_id" id="artist_id" required>
        @foreach ($artists as $artist)
            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
        @endforeach
    </select>

    <label for="lyrics">Lyrics</label>
    <textarea name="lyrics" id="lyrics" required></textarea>

  

    <button type="submit">Create Song</button>
</form>
</div>
@stop