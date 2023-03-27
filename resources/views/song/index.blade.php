

@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <!-- Ajouter un sous-nav pour les genres, les artistes et les chansons -->
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('song')}}">Chansons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('artist')}}">Artistes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('genre')}}">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('groupe')}}">Groupes</a>
                        </li>
                    </ul>
                </div>
               
    <div class="row">
        <div class="col-md-10" style="margin:auto;padding-top:10%">

            <a href="{{ url('/song/create') }}" class="btn btn-info">Ajouter Chanson</a>
            <br><br>

            <div class="table-responsive">
                <table class="table table-striped">
                    <caption>La liste des chansons</caption>
                    <thead>
                        <tr>
        <th scope="col">#</th>
          <th scope="col">Titre</th>
         
          <th scope="col">Artiste</th>
          <th scope="col">Image</th>
          <!-- <th scope="col">Audio</th> -->
          <!-- <th scope="col">Ajouter à la liste de lecture</th> -->
          <th scope="col">Action
          </th>
          <!-- <th scope="col">Voir plus</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach($song as $song)
    
        <tr>
        <td>{{ $loop->iteration }}</td>
          <td>{{ $song->title }}</td>
          @if($song->groupe && empty($song->artist))
  <td>{{ $song->groupe->name }}</td>
  <td><img src="{{ asset('storage/images/'.$song->groupe->image) }}" alt="{{ $song->name }}" width="50"></td>
@endif
@if($song->artist && empty($song->groupe))
  <td>{{ $song->artist->name }}</td>
  <td><img src="{{ asset('storage/images/'.$song->artist->image) }}" alt="{{ $song->name }}" width="50"></td>
@endif
@if($song->artist && $song->groupe)
  <td>{{ $song->artist->name }} && {{ $song->groupe->name }}</td>
  <td><img src="{{ asset('storage/images/'.$song->artist->image) }}" alt="{{ $song->name }}" width="50"></td>
@endif

          <!-- <td>
            <audio controls>
              <audio src="{{ asset('storage/'.$song->audio_path) }}" type="audio/mpeg">
            </audio>
          </td> -->
          <!-- <td><button class="btn btn-primary">Ajouter à la liste de lecture</button></td> -->
          <td style="display:flex;justify-content:space-around">
                             
                                <a class="btn btn-sm btn-info"  href=" {{ url('/song/'.$song->id.'/edit') }}" >Modifier</a>
                                @if($song->status != 'archived')
    <form action="{{ url('/song/'.$song->id) }}" method="post" style="display:inline-block;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
                                    
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this song?')">Archiver</button>
    </form>
@else
<form action="{{ route('song.unarchive', $song->id) }}" method="post" style="display:inline-block;">
{!! csrf_field() !!}
    {{ method_field('POST') }}               
    <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to unarchive this song?')">Désarchiver</button>
</form>

@endif

                            </td>
          <!-- <td><a  class="btn btn-secondary">Voir plus</a></td> -->
        </tr>
     
        @endforeach
                        </tbody>
    </table>
  </div>
</div>
</div>
</div>
          
        </div>
    </div>
</div>

@endsection