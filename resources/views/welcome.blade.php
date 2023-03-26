
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
    
		<div class="container-fluid" style="  background: linear-gradient(to right,#434043, #1595be);">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('play')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:gray;">LISTE DE MUSIQUE</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{route('home')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">ARTISTES</span>  </a>
                            </li>
                            <li>
                                <a href="{{route('search')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">RECHERCHE</span>  </a>
                            </li>
                        </ul>
                    </li>
                 
                   
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1" style="width:100%"> {{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                       
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a></li>
                    </ul>
                </div>
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
    @if($play->song->status!='archived')
	<div class="song col-md-12 col-lg-12 mb-12">
	
      <div class="img">
      <img src="{{ asset('storage/images/'.$play->song->artist->image) }}"/>
      </div>
      <div class="more">
      <audio src="{{asset('images/1.jpg')}}" id="music"></audio>
      <div class="song_info">
         <p id="title">{{$play->song->title}}</p>
         <p>{{$play->song->artist->name}}</p>
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





