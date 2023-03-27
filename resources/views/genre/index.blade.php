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
                            <a class="nav-link " href="{{url('song')}}">Chansons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('artist')}}">Artistes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('genre')}}">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('groupe')}}">Groupes</a>
                        </li>
                    </ul>
                </div>
               
    <div class="row">
        <div class="col-md-10" style="margin:auto;padding-top:10%">
            <a href="{{ url('/genre/create') }}" class="btn btn-info">Ajouter Genre</a>
            <br><br>

            <div class="table-responsive">
                <table class="table table-striped">
                    <caption>La liste des Genres</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($genre as $genre)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $genre->name }}</td>
                            <td><img src="{{ asset('storage/images/'.$genre->image) }}" alt="{{ $genre->name }}" width="50"></td>
                            <td>{{ $genre->description }}</td>
                            <td style="display:flex;justify-content:space-around">
                                <!-- <a href="{{ url('/genre/'.$genre->id) }}" class="btn btn-primary">Show</a> -->
                                <a  class="btn btn-sm btn-info" href="{{ url('/genre/'.$genre->id.'/edit') }}" >modifier</a>
                                <form action="{{ url('/genre/'.$genre->id) }}" method="post" style="display:inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this genre?')">supprimer</button>
                                </form>
                            </td>
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