
let track_art = document.querySelector('.track-art');

let playpause_btn = document.querySelector('.playpause-track');
var audio = document.getElementById("myAudio");


function playTrack(){
    
    
        audio.play();
    track_art.classList.add('rotate');
   
    playpause_btn.innerHTML = '<i class="fa fa-pause-circle fa-5x" onclick="pauseTrack()"></i>';
}
function pauseTrack(){
    audio.pause();
    track_art.classList.remove('rotate');

    playpause_btn.innerHTML = '<i class="fa fa-play-circle fa-5x" onclick="playTrack()"></i>';
}

