
@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h1 class="mb-4">Modifier Chanson</h1>
    <form action="{{ url('song/'.$song->id) }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    {{ method_field('PATCH') }}

        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="title" placeholder="Entrer le nom de chanson" value="{{ $song->title }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputYear" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputYear" name="year" placeholder="Entrer l'année" value="{{$song->year }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputTrack" class="col-sm-2 col-form-label">Track</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTrack" name="track" placeholder="Entrer le numéro de piste" value="{{$song->track }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputFilename" class="col-sm-2 col-form-label">Filename</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputFilename" name="filename" placeholder="Entrer le nom de fichier" value="{{$song->filename }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputDuration" class="col-sm-2 col-form-label">Duration</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="inputDuration" name="duration" placeholder="Entrer la durée" value="{{$song->duration }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputLyrics" class="col-sm-2 col-form-label">Lyrics</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="inputLyrics" name="lyrics" value="{{$song->lyrics}}" placeholder="Entrer les paroles">{{$song->lyrics }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputAudio" class="col-sm-2 col-form-label">Audio</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputAudio" name="audio_path">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputAudio" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputAudio" name="image">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputGenre" class="col-sm-2 col-form-label">Genre</label>
          
                <select class="col-sm-10" name="genre_id" id="inputGenre" required>
                    @foreach ($genre as $genre)
                       

            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
       
    </div>
  
    <div class="row mb-3">
        <label for="inputCountry" class="col-sm-2 col-form-label">Artiste</label>
       
        <select class="col-sm-10" name="artist_id" id="artist_id" required>
        <option value="6">Aucun</option>
        @foreach ($artists as $artist)
            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
        @endforeach
    </select>
        
    </div>
    <div class="row mb-3">
            <label for="artist_id"  class="col-sm-2 col-form-label">Groupe</label>
            <select name="groupe_id" id="artist_id" class="col-sm-10" >
            <option value="1">Aucun</option>
                @foreach ($groupes as $groupe)
                @if($groupe->name!=NULL)
              
                <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
    <div class="row mb-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
</div>
@endsection
