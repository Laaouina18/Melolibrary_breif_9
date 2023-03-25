@extends('layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<div class="container">
    <div>

    <div>
        <h2>welcome</h2>
        <a href="{{url('/groupe/create')}}" class="btn btn-info">
            ajouter
</a>

        <div class="table-responsive">
  <table class="table">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">birthday</th>
      <th scope="col">country</th>
      <th scope="col"> action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($groupe as $item)
    <tr>
      <td scope="row">{{$loop->iteration}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->image}}</td>
      <td>{{$item->description}}</td>
      <td>{{$item->date_creation}}</td>
      <td>{{$item->pays}}</td>
      <td>
      <a href="{{ url('/groupe/' . $item->id ) }}" class="btn btn-primary">SHOW</a>
        <a href="{{url('/groupe/'.$item->id.'/edit')}}" class="btn btn-primary">edit</a>
        <form action="{{url('/groupe/'.$item->id)}}" method="post">
          {{method_field('DELETE')}}
          {{csrf_field()}}
        <button  class="btn btn-danger" type="submit" onclick="return confirm('confirm delete?')">delete</button>
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
@endsection