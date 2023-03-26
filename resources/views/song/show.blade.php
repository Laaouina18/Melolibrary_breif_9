
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Audio player</title>
    
<meta name="keywords" content="audio, player, music">
<meta property="og:title" content="Audio player">

<link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
   <div class="player">
       <div class="wrapper">
           <div class="details">
              
               <div class="track-art" style="background-image:url('{{ asset('storage/images/'.$song->artist->image) }}');"></div>

               <div class="track-name">{{$song->title}}</div>
               <div class="track-artist">{{$song->artist->name}}</div>
           </div>

           <div class="slider_container">
               <div class="current-time">00:00</div>
                <input type="range" min="1" max="100" value="0" class="seek_slider" >
                <div class="total-duration">{{$song->duration}}</div>
           </div>

        
           <form action="{{ route('playlist.add') }}" method="POST">
    @csrf
    <input type="hidden" name="song_id" value="{{ $song->id }}">
    <button type="submit" class="btn btn-primary">Ajouter à la playlist</button>
</form>

           <div class="buttons">
               <div class="random-track" onclick="randomTrack()">
                   <i class="fas fa-random fa-2x" title="random"></i>
               </div>
               <div class="prev-track" onclick="prevTrack()">
                    <i class="fa fa-step-backward fa-2x"></i>
                </div>
                <div class="playpause-track" >
                    <i class="fa fa-play-circle fa-5x"></i>
                </div>
                <div class="next-track" >
                    <i class="fa fa-step-forward fa-2x"></i>
                </div>
                <div class="repeat-track" >
                    <i class="fa fa-repeat fa-2x" title="repeat"></i>
                </div>
           </div>

            <div id="wave">
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
            </div>  
       </div>
   </div>
   <div class="container mt-4">
    <h4>Ajouter un commentaire</h4>
    <form action="{{ route('comments', ['song' => $song->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Commentaire :</label>
            <input class="form-control" id="comment" name="body" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <hr>

    <h4>Commentaires</h4>
    <div class="comments">
        @foreach($song->comments as $comment)
            <div class="comment">
                <h6 class="mb-0">{{$comment->user->name}}: {{$comment->body}}</h6>
               
                <small>date:{{$comment->created_at}}</small>
            </div>
        @endforeach
    </div>
</div>


</body>
</html>

<!--- Ajouter le fichier javascript --->
<script src="{{asset('js/show.js')}}"></script>
<!--- Ajouter la bibliothèque Bootstrap --->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
