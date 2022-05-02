<!DOCTYPE html>
<html lang="en">
<head>

  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Player</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
   <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
  <div class="wrapper">
    <div class="top-bar">
      
    </div>
    <div class="img-area">
      <img src="" alt="">
    </div>
    <div class="song-details">
      <p class="name"></p>
      <p class="artist"></p>
    </div>

    


    <div class="progress-area">
      <div class="progress-bar">
        <audio id="main-audio" src=""></audio>
      </div>
      <div class="song-timer">
        <span class="current-time">0:00</span>
        <span class="max-duration">0:00</span>
      </div>
    </div>
    <div class="controls">
    

      <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
      <i id="prev" class="material-icons">skip_previous</i>
      <div class="play-pause">
        <i class="material-icons play">play_arrow</i>
      </div>
      <i id="next" class="material-icons">skip_next</i>
      <i id="more-music" class="material-icons">queue_music</i>
    </div>
    <div class="music-list">
      <div class="header">
        <div class="row">
          <i class= "list material-icons">queue_music</i>
          <span>Music list</span>
        </div>
        <i id="close" class="material-icons">close</i>
      </div>
      <ul>
        <!-- here li list are coming from js -->
      </ul>
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



  <script src="js/music-list.js"></script>
  <script src="js/script.js"></script>

</body>
</html>

<style >





@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
*::before, *::after{
  padding: 0;
  margin: 0;
}
:root{
  --pink: #a0556f;
  --violet: #9f6ea3;
  --lightblack: #515C6F;
  --white: #ffffff;
  --darkwhite: #c4baba;
  --pinkshadow: #ffcbdd;
  --lightbshadow: rgba(0,0,0,0.15);
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: linear-gradient(var(--pink) 0%, var(--violet) 100%);
}
.wrapper{
  width: 460px;
  padding: 25px 30px;
  overflow: hidden;
  position: relative;
  border-radius: 15px;
  background: var(--white);
  box-shadow: 0px 6px 15px var(--lightbshadow);
}
.wrapper i{
  cursor: pointer;
}
.top-bar, .progress-area .song-timer, 
.controls, .music-list .header, .music-list ul li{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.top-bar i{
  font-size: 30px;
  color: var(--lightblack);
}
.top-bar i:first-child{
  margin-left: -7px;
}
.top-bar span{
  font-size: 18px;
  margin-left: -3px;
  color: var(--lightblack);
}
.img-area{
  margin: 65px;
  height: 250px;
  width: 250px;
  border: 2px solid #fff;
  background-size: cover;
  background-position: center;
  border-radius: 50%;
  -moz-box-shadow: 0px 6px 5px #ccc;
  -webkit-box-shadow: 0px 6px 5px #ccc;
  box-shadow: 0px 6px 5px #ccc;
  -moz-border-radius: 190px;
  -webkit-border-radius: 190px;
  border-radius: 190px;
  overflow: hidden;
  margin-top: 25px;
  box-shadow: 0px 6px 12px var(--lightbshadow);
}
.img-area img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
}
.song-details{
  text-align: center;
  margin: 30px 0;
}
.song-details p{
  color: var(--lightblack);
}
.song-details .name{
  font-size: 21px;
}
.song-details .artist{
  font-size: 18px;
  opacity: 0.9;
  line-height: 35px;
}
.progress-area{
  height: 6px;
  width: 100%;
  border-radius: 50px;
  background: #f0f0f0;
  cursor: pointer;
}
.progress-area .progress-bar{
  height: inherit;
  width: 0%;
  position: relative;
  border-radius: inherit;
  background: linear-gradient(90deg, var(--pink) 0%, var(--violet) 100%);
}
.progress-bar::before{
  content: "";
  position: absolute;
  height: 12px;
  width: 12px;
  border-radius: 50%;
  top: 50%;
  right: -5px;
  z-index: 2;
  opacity: 0;
  pointer-events: none;
  transform: translateY(-50%);
  background: inherit;
  transition: opacity 0.2s ease;
}
.progress-area:hover .progress-bar::before{
  opacity: 1;
  pointer-events: auto;
}
.progress-area .song-timer{
  margin-top: 2px;
}
.song-timer span{
  font-size: 13px;
  color: var(--lightblack);
}
.controls{
  margin: 40px 0 5px 0;
}
.controls i{
  font-size: 28px;
  user-select: none;
  background: linear-gradient(var(--pink) 0%, var(--violet) 100%);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.controls i:nth-child(2),
.controls i:nth-child(4){
  font-size: 43px;
}
.controls #prev{
  margin-right: -13px;
}
.controls #next{
  margin-left: -13px;
}
.controls .play-pause{
  height: 54px;
  width: 54px;
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: linear-gradient(var(--white) 0%, var(--darkwhite) 100%);
  box-shadow: 0px 0px 5px var(--pink);
}
.play-pause::before{
  position: absolute;
  content: "";
  height: 43px;
  width: 43px;
  border-radius: inherit;
  background: linear-gradient(var(--pink) 0%, var(--violet) 100%);
}
.play-pause i{
  height: 43px;
  width: 43px;
  line-height: 43px;
  text-align: center;
  background: inherit;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  position: absolute;
}
.fa-volume-up:before{
  color:black;
}
.fa-volume-down:before{
  color:black;
}

i.fa-volume-down,
i.fa-volume-up{
    padding: 10px;
   background-color: linear-gradient(var(--pink) 0%, var(--violet) 100%);
}
.music-list{
  position: absolute;
  background: var(--white);
  width: 100%;
  left: 0;
  bottom: -55%;
  opacity: 0;
  pointer-events: none;
  z-index: 5;
  padding: 15px 30px;
  border-radius: 15px;
  box-shadow: 0px -5px 10px rgba(0,0,0,0.1);
  transition: all 0.15s ease-out;
}
.music-list.show{
  bottom: 0;
  opacity: 1;
  pointer-events: auto;
}
.header .row{
  display: flex;
  align-items: center;
  font-size: 19px;
  color: var(--lightblack);
}
.header .row i{
  cursor: default;
}
.header .row span{
  margin-left: 5px;
}
.header #close{
  font-size: 22px;
  color: var(--lightblack);
}
.music-list ul{
  margin: 10px 0;
  max-height: 260px;
  overflow: auto;
}
.music-list ul::-webkit-scrollbar{
  width: 0px;
}
.music-list ul li{
  list-style: none;
  display: flex;
  cursor: pointer;
  padding-bottom: 10px;
  margin-bottom: 5px;
  color: var(--lightblack);
  border-bottom: 1px solid #E5E5E5;
}
.music-list ul li:last-child{
  border-bottom: 0px;
}
.music-list ul li .row span{
  font-size: 17px;
}
.music-list ul li .row p{
  opacity: 0.9;
}
ul li .audio-duration{
  font-size: 16px;
}
ul li.playing{
  pointer-events: none;
  color: var(--violet);
}



  body{
    font-family: Arial, Helvetica, sans-serif;
    color: whitesmoke;
}
.player{
    height: 95vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
.wrapper{
    background: var(--white)!important;
    border: 1px solid transparent;
    padding: 30px;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}
.details{
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
.track-art{
    margin: 25px;
    height: 250px;
    width: 250px;
    border: 2px solid #fff;
    background-size: cover;
    background-position: center;
    border-radius: 50%;
    -moz-box-shadow: 0px 6px 5px #ccc;
    -webkit-box-shadow:0px 6px 5px #ccc;
    box-shadow: 0px 6px 5px #ccc;
    -moz-border-radius:190px;
    -webkit-border-radius:190px;
    border-radius: 190px;
}


.slider_container{
    display: flex;
    justify-content: center;
    align-items: center;
}
.seek_slider,
.volume_slider{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    height: 5px;
    /* background: #fff!important; */
    
    -webkit-transition: .2s;
    transition: opacity .2s;
}
.seek_slider::-webkit-slider-thumb,
.volume_slider::-webkit-slider-thumb{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 15px;
    height: 15px;
    /* background: white; */
    border: 3px solid #3774ff;
    cursor: pointer;
    border-radius: 100%;
}
.seek_slider:hover,
.volume_slider:hover{
    opacity: 1.0;
}
.seek_slider{
    width: 60%;
}
.volume_slider{
    width: 30%;
}

.now-playing{
    font-size: 1rem;
}
.track-name{
    font-size: 2.5rem;
}
.track-artist{
    margin-top: 5px;
    font-size: 1.5rem;
}
.buttons{
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 30px;
}
.active{
    color: black;
}
.repeat-track,
.random-track,
.playpause-track,
.prev-track,
.next-track{
    padding: 25px;
    opacity: 0.8;
    transition: opacity .2s;
}
.repeat-track:hover,
.random-track:hover,
.playpause-track:hover,
.prev-track:hover,
.next-track:hover{
    opacity: 1.0;
}
.slider_container{
    display: flex;
    justify-content: center;
    align-items: center;
}
.seek_slider,
.volume_slider{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: pink;
    height: 5px;
    background: #83a9ff;
    -webkit-transition: .2s;
    transition: opacity .2s;
}
.seek_slider::-webkit-slider-thumb,
.volume_slider::-webkit-slider-thumb{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 15px;
    height: 15px;
    background: white;
    border: 3px solid #3774ff;
    cursor: pointer;
    border-radius: 100%;
}
.seek_slider:hover,
.volume_slider:hover{
    opacity: 1.0;
}
.seek_slider{
    width: 60%;
}
.volume_slider{
    width: 30%;
}

.current-time,
.total-duration{
    padding: 10px;
}
i.fa-volume-down,
i.fa-volume-up{
    padding: 10px;
   background-color: linear-gradient(var(--pink) 0%, var(--violet) 100%);
}
i,
i.fa-play-circle,
i.fa-pause-circle,
i.fa-step-forward,
i.fa-step-backward{
    cursor: pointer;
}
.randomActive{
    color: black;
}
.rotate{
    animation: rotation 8s infinite linear;
}
@keyframes rotation{
    from{
        transform: rotate(0deg);
    }
    to{
        transform: rotate(359deg);
    }
}
.loader{
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.loader .stroke{
    background: #f1f1f1;
    height: 150%;
    width: 10px;
    border-radius: 50px;
    margin: 0px 5px;
    animation: animate 1.4s linear infinite;
}
@keyframes animate{
    50%{
        height: 20%;
        background: #4286f4;
    }
    100%{
        height: 100%;
    }
}
.stroke:nth-child(1){
    animation-delay: 0s;
}
.stroke:nth-child(2){
    animation-delay: 0.3s;
}
.stroke:nth-child(3){
    animation-delay: 0.6s;
}
.stroke:nth-child(4){
    animation-delay: 0.9s;
}
.stroke:nth-child(5){
    animation-delay: 0.6s;
}
.stroke:nth-child(6){
    animation-delay: 0.3s;
}
.stroke:nth-child(7){
    animation-delay: 0s;
}

</style>

<script >
let now_playing = document.querySelector('.now-playing');
let track_art = document.querySelector('.track-art');
let track_name = document.querySelector('.track-name');
let track_artist = document.querySelector('.track-artist');

let playpause_btn = document.querySelector('.playpause-track');
let next_btn = document.querySelector('.next-track');
let prev_btn = document.querySelector('.prev-track');

let seek_slider = document.querySelector('.seek_slider');
let volume_slider = document.querySelector('.volume_slider');
let curr_time = document.querySelector('.current-time');
let total_duration = document.querySelector('.total-duration');
let wave = document.getElementById('wave');
let randomIcon = document.querySelector('.fa-random');
let curr_track = document.createElement('audio');

let track_index = 0;
let isPlaying = false;
let isRandom = false;
let updateTimer;

const music_list = [
    {
        img : 'images/stay.png',
        name : 'Stay',
        artist : 'The Kid LAROI, Justin Bieber',
        music : 'music/stay.mp3'
    },
    {
        img : 'images/fallingdown.jpg',
        name : 'Falling Down',
        artist : 'Wid Cards',
        music : 'music/fallingdown.mp3'
    },
    {
        img : 'images/faded.png',
        name : 'Faded',
        artist : 'Alan Walker',
        music : 'music/Faded.mp3'
    },
    {
        img : 'images/ratherbe.jpg',
        name : 'Rather Be',
        artist : 'Clean Bandit',
        music : 'music/Rather Be.mp3'
    }
];

loadTrack(track_index);

function loadTrack(track_index){
    clearInterval(updateTimer);
    reset();

    curr_track.src = music_list[track_index].music;
    curr_track.load();

    track_art.style.backgroundImage = "url(" + music_list[track_index].img + ")";
    track_name.textContent = music_list[track_index].name;
    track_artist.textContent = music_list[track_index].artist;
    now_playing.textContent = "Playing music " + (track_index + 1) + " of " + music_list.length;

    updateTimer = setInterval(setUpdate, 1000);

    curr_track.addEventListener('ended', nextTrack);
    random_bg_color();
}

function random_bg_color(){
    let hex = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e'];
    let a;

    function populate(a){
        for(let i=0; i<6; i++){
            let x = Math.round(Math.random() * 14);
            let y = hex[x];
            a += y;
        }
        return a;
    }
    let Color1 = populate('#');
    let Color2 = populate('#');
    var angle = 'to right';

    let gradient = 'linear-gradient(' + angle + ',' + Color1 + ', ' + Color2 + ")";
    document.body.style.background = gradient;
}
function reset(){
    curr_time.textContent = "00:00";
    total_duration.textContent = "00:00";
    seek_slider.value = 0;
}
function randomTrack(){
    isRandom ? pauseRandom() : playRandom();
}
function playRandom(){
    isRandom = true;
    randomIcon.classList.add('randomActive');
}
function pauseRandom(){
    isRandom = false;
    randomIcon.classList.remove('randomActive');
}
function repeatTrack(){
    let current_index = track_index;
    loadTrack(current_index);
    playTrack();
}
function playpauseTrack(){
    isPlaying ? pauseTrack() : playTrack();
}
function playTrack(){
    curr_track.play();
    isPlaying = true;
    track_art.classList.add('rotate');
    wave.classList.add('loader');
    playpause_btn.innerHTML = '<i class="fa fa-pause-circle fa-5x"></i>';
}
function pauseTrack(){
    curr_track.pause();
    isPlaying = false;
    track_art.classList.remove('rotate');
    wave.classList.remove('loader');
    playpause_btn.innerHTML = '<i class="fa fa-play-circle fa-5x"></i>';
}
function nextTrack(){
    if(track_index < music_list.length - 1 && isRandom === false){
        track_index += 1;
    }else if(track_index < music_list.length - 1 && isRandom === true){
        let random_index = Number.parseInt(Math.random() * music_list.length);
        track_index = random_index;
    }else{
        track_index = 0;
    }
    loadTrack(track_index);
    playTrack();
}
function prevTrack(){
    if(track_index > 0){
        track_index -= 1;
    }else{
        track_index = music_list.length -1;
    }
    loadTrack(track_index);
    playTrack();
}
function seekTo(){
    let seekto = curr_track.duration * (seek_slider.value / 100);
    curr_track.currentTime = seekto;
}
function setVolume(){
    console.log('test');
    curr_track.volume = volume_slider.value / 100;
}
function setUpdate(){
    let seekPosition = 0;
    if(!isNaN(curr_track.duration)){
        seekPosition = curr_track.currentTime * (100 / curr_track.duration);
        seek_slider.value = seekPosition;

        let currentMinutes = Math.floor(curr_track.currentTime / 60);
        let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
        let durationMinutes = Math.floor(curr_track.duration / 60);
        let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

        if(currentSeconds < 10) {currentSeconds = "0" + currentSeconds; }
        if(durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
        if(currentMinutes < 10) {currentMinutes = "0" + currentMinutes; }
        if(durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

        curr_time.textContent = currentMinutes + ":" + currentSeconds;
        total_duration.textContent = durationMinutes + ":" + durationMinutes;
    }
}






</script>