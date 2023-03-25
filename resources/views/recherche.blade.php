@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('search') }}" method="get">
            <div class="form-group">
                <label for="query">Recherche:</label>
                <input type="text" class="form-control" name="query" placeholder="Entrez votre recherche ici">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        
        @if($songs->count() > 0)
            <h3>Résultats de la recherche pour les chansons:</h3>
            <div class="row">
                @foreach($songs as $song)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $song->image_url }}" alt="{{ $song->title }}">
                            <div class="card-body">
                                <p class="card-text">{{ $song->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('songs.show', $song) }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        @if($artists->count() > 0)
            <h3>Résultats de la recherche pour les artistes:</h3>
            <div class="row">
                @foreach($artists as $artist)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $artist->image_url }}" alt="{{ $artist->name }}">
                            <div class="card-body">
                                <p class="card-text">{{ $artist->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('artists.show', $artist) }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        @if($genres->count() > 0)
            <h3>Résultats de la recherche pour les genres:</h3>
            <div class="row">
                @foreach($genres as $genre)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $genre->image_url }}" alt="{{ $genre->name }}">
                            <div class="card-body">
                                <p class="card-text">{{ $genre->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('genres.show', $genre) }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
