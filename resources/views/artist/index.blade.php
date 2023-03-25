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
                            <a class="nav-link active" href="{{url('artist')}}">Artistes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('genre')}}">Genres</a>
                        </li>
                    </ul>
                </div>
               
    <div class="row">
        <div class="col-md-10" style="margin:auto;padding-top:10%">
    <a class="btn btn-info" href="{{ url('/artist/create') }}">Ajouter</a>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Birthday</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artist as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                    <img class="card-img-top" src="{{ asset('storage/images/'.$item->image) }}" alt="{{$item->name }}" style="width:80px">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->birthday }}</td>
                    <td style="display:flex;justify-content:space-around">
                        <a class="btn btn-sm btn-info" href="{{ url('/artist/'.$item->id.'/edit') }}">modifier</a>

                        <form action="{{ url('/artist/'.$item->id) }}" method="post" class="d-inline-block">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Confirm delete?')">archiffer</button>
                        </form>
<!-- 
                        <a href="{{ url('/artist/' . $item->id ) }}" class="btn btn-sm btn-secondary">Voir plus...</a> -->
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