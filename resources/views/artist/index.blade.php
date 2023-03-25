@extends('layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<a class="btn btn-info" href="{{url('/artist/create')}}" class="btn btn-primary">Ajouter</a>
   
    <div class="container" id="product-cards">
     
      <div class="row" style="margin-top: 30px;">
      @foreach($artist as $item)
        <div class="col-md-3 py-3 py-md-0 produit" style="margin-bottom:22px;">
          <div class="card ">
         <img src="{{ asset('storage/images/'.$item->image) }}" alt="{{ $item->name }}">
          {{$item->birthday}}
            <div class="card-body">
              <h3 class="text-center produit_name">{{$item->name}} </h3>
              <p class="text-center">{{$item->description}}</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>{{$item->birthday}}<span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
            <a class="btn btn-info" href="{{url('/artist/'.$item->id.'/edit')}}" class="btn btn-primary">edit</a>
        <form action="{{url('/artist/'.$item->id)}}" method="post">
          {{method_field('DELETE')}}
          {{csrf_field()}}
        <button  class="btn btn-danger" type="submit" onclick="return confirm('confirm delete?')">delete</button>
        </form>
    
           
            <div><a href="{{ url('/artist/' . $item->id ) }}" class="btn btn-secondary d-flex justify-content-start" style="margin-bottom:2px; width:40%;">Voir plus...</a></div>
          </div>
        </div>
        @endforeach
        </div>
      </div>
      
   



 
  </tbody>
</table>
</div>
    </div>
    </div>

    
</div>
@endsection