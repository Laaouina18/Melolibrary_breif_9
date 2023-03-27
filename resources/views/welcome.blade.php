
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Audio player</title>
    
<meta name="keywords" content="audio, player, music">
<meta property="og:title" content="Audio player">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 
 <!--Script Link  put befor end of </body> -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- top section -->

	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Poiret+One|Biryani|Raleway:300|Source+Code+Pro|Muli" rel="stylesheet">
		
		<body>
    
		<div class="container-fluid" style="  background: linear-gradient(to right,#434043, #B2EBF2);">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('play')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">LISTE DE MUSIQUE</span>
                        </a>
                    </li>
                    <li>

                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{route('home')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">ARTISTES</span>  </a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="w-100">
                                <a href="{{route('dashboard')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">DASHBOARD</span>  </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{route('search')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">RECHRCHE</span>  </a>
                            </li>
                        </ul>
                    </li>
                 
                   
                </ul>
                <hr>
            
            </div>
        </div>
        <div class="col py-12">
        <div class="container-fluid mt-12">
   
       
  <div class="tracks" >

    <!-- list of song will add here from 'song_list.js' file -->

    <!-- small music player -->
	<div class="row">
		
	@foreach($play as $play)
	@if(Auth::user()->id==$play->user_id)
    @if(isset($play) && isset($play->song) && $play->song->status!='archived')
   
    
	<div class="song col-md-12 col-lg-12 mb-12">
	

    <div class="img"> <img src="{{ asset('storage/images/'.$play->song->image) }}" style="width:100%;height:50vh"></div>
             
      <div class="more">
      <audio src="{{asset('images/1.jpg')}}" id="music"></audio>
      <div class="song_info">
         <p id="title">{{$play->song->title}}</p>
         @if( empty($song->groupe) && isset($play->song->groupe->name))
         <p>{{$play->song->artist->name}}</p>
         @endif
         @if( empty($song->artist) && isset($song->groupe) )
         <p>{{$play->song->groupe->name}}</p>
         @endif
         @if(isset($song->artist->name) && isset( $song->groupe->name))
         <p>{{$play->song->groupe->name}}&&{{$play->song->artist->name}}</p>
         @endif
      </div>
      <a href="{{ url('/song/' . $play->song->id ) }}"id="play_btn"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
      </div>
    </div>
	
    @endif
    @endif
	@endforeach


	</div>
</div>
        </div>
    </div>
</div>





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>





