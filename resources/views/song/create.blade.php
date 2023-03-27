@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5">Ajouter un song</h1>
    <form action="{{ url('song') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required maxlength="255">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" required min="1900">
        </div>

        <div class="mb-3">
            <label for="track" class="form-label">Track</label>
            <input type="text" name="track" id="track" class="form-control" required maxlength="255">
        </div>

        <div class="mb-3">
            <label for="audio_path" class="form-label">Audio Path</label>
            <input type="file" name="audio_path" id="audio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="audio_path" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="filename" class="form-label">Filename</label>
            <input type="text" name="filename" id="filename" class="form-control" required maxlength="255">
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="time" name="duration" id="duration" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-control" required>
                @foreach ($genre as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="artist_id" class="form-label">Artist</label>
            <select name="artist_id" id="artist_id" class="form-control" >
            <option value="3">Aucun</option>
                @foreach ($artists as $artist)
                @if($artist->name!=NULL)
                
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
@endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="artist_id" class="form-label">Groupe</label>
            <select name="groupe_id" id="artist_id" class="form-control" >
            <option value="1">Aucun</option>
                @foreach ($groupes as $groupe)
                @if($groupe->name!=NULL)
              
                <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="lyrics" class="form-label">Lyrics</label>
            <textarea name="lyrics" id="lyrics" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Song</button>
    </form>
</div>
@endsection
