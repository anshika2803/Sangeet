var currentPlaylist = [];
var shufflePlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var tempPlaylist = [];
var shuffle = false;
var timer;

function openPage(url) {
	if(timer != null){
		clearTimeout(timer);
	}

	if(url.indexOf("?") == -1) {
		url = url + "?";
	}

	var encodedUrl = encodeURI(url);
	console.log(encodedUrl);
	$("#mainContent").load(encodedUrl);
	$("body").scrollTop(0);
	history.pushState(null, null, url);
}


function formatTime(seconds){
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60);
	var seconds = time - (minutes*60);
	var extraZero;
	if(seconds<10){
		extraZero ="0";
	}
	else{
	extraZero = "";
		
	}
	return minutes + ":" + extraZero + seconds;
}
function updateTimeProgressBar(audio){
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio){
	var volume = audio.volume * 100;
	$(".volumeBar .progress").css("width", volume + "%");
}
function playFirstSong(){
	setTrack (tempPlaylist[0], tempPlaylist , true);
}

function Audio(){
    this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.audio.addEventListener("ended",function(){
		nextSong();
	});

	this.audio.addEventListener("canplay", function(){
		//this refers to the object that event was called on
		var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
        updateVolumeProgressBar(this);
	});
	this.audio.addEventListener("timeupdate", function(){
		if(this.duration){
			updateTimeProgressBar(this);
		}
	});
	this.audio.addEventListener("volumechange", function(){
		updateVolumeProgressBar(this);
	});

	this.setTrack = function(track) {
		this.currentlyPlaying = track;
	    this.audio.src = track.path;
	}

	this.play = function(){
		this.audio.play();
	}

	this.pause = function(){
		this.audio.pause();
	}
	this.setTime = function(seconds){
		this.audio.currentTime = seconds;
	}
}