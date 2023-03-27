
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Audio player</title>
    
<meta name="keywords" content="audio, player, music">
<meta property="og:title" content="Audio player">

<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('js/show.js')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 
 <!--Script Link  put befor end of </body> -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
<div class="container-fluid" style="  background: linear-gradient(to right,#434043, #1595be);" >
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
                        <a href="{{route('dashboard')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{route('home')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">ARTISTES</span>  </a>
                            </li>
                            <li>
                                <a href="{{route('search')}}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">RECHRCHE</span>  </a>
                            </li>
                        </ul>
                    </li>
                 
                   
                </ul>
                <hr>
            
            </div>
        </div>
        <div class="col py-3">
        <div class="container-fluid mt-4">
    <div class="row">
       
   <div class="player">
       <div class="wrapper">
           <div class="details">
       
               <div class="track-art" style="background-image:url('{{ asset('storage/images/'.$song->image) }}');" ></div>
              
               <div class="track-name">{{$song->title}}</div>
               @if(isset($song->artist->name) && empty($song->groupe->name))
               <div class="track-artist">{{$song->artist->name}}</div>
               @endif
               @if(isset($song->artist->name) && empty($song->groupe->name))
               <div class="track-artist">{{$song->groupe->name}}</div>
               @endif
               @if(isset($song->artist->name) && isset($song->groupe->name))
               <div class="track-artist">{{$song->groupe->name}}&&{{$song->artist->name}}</div>
               @endif
           </div>

           <div class="slider_container">
               <div class="current-time">00:00</div>
                <input type="range" min="1" max="100" value="0" class="seek_slider" >
                <div class="total-duration">{{$song->duration}}</div>
           </div>

        
           <form action="{{ route('playlist.add') }}" method="POST">
    @csrf
    <input type="hidden" name="song_id" value="{{ $song->id }}">
    <button type="submit" class="class="btn btn-info"">Ajouter à la playlist</button>
</form>

           <div class="buttons">
               <div class="random-track" onclick="randomTrack()">
                   <i class="fas fa-random fa-2x" title="random"></i>
               </div>
               <div class="prev-track" onclick="prevTrack()">
                    <i class="fa fa-step-backward fa-2x"></i>
                </div>
                <div class="playpause-track" >
                    <i class="fa fa-play-circle fa-5x" onclick="playTrack()"></i>
                </div>
                <audio id="myAudio">
  <source src="{{ asset('storage/audio/'.$song->audio_path) }}" type="audio/mpeg">
</audio>
                <div class="next-track" >
                    <i class="fa fa-step-forward fa-2x"></i>
                </div>
                <div class="repeat-track" >
                    <i class="fa fa-repeat fa-2x" title="repeat"></i>
                </div>
           </div>

           
       </div>
   </div>
   <div class="container mt-4">
   <h4>Commentaires</h4>
    <form  action="{{ route('comments', ['song' => $song->id]) }}" method="POST" style="display:flex;flex-direction:row;justify-content:space-between">
        @csrf
        <div class="form-group" style="width:88%" >
          
            <input class="form-control" id="comment" name="body" rows="5"  required></textarea>
        </div>
        <div>
        <button type="submit" class="btn btn-info">Commenter</button>
</div>
    </form>
    

    <hr>

   
    <div class="comments">
        @foreach($song->comments as $comment)
       
        <div class="comment">
                <h6 class="mb-0">{{$comment->user->name}}: {{$comment->body}}</h6>
               
                <small>date:{{$comment->created_at}}</small>
            </div>
    <form action="{{ url('/comments/'.$comment->id) }}" method="post" style="display:inline-block;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
                                    
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Archiver</button>
    </form>

            
        @endforeach
    </div>
</div>

</div>
</div>
        </div>
    </div>
</div>


</body>
</html>

<!--- Ajouter le fichier javascript --->
<script src="{{asset('js/show.js')}}"></script>
<!--- Ajouter la bibliothèque Bootstrap --->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
