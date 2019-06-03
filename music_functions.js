/**
 * Thank you Heavenly Father
 * Created on 10/11/2017.
 */
var play = false;
var player = document.getElementById('player');
var m_play_btn;
var timer;
var timeInterval;
var volume = 0.30;
var seeker;
var jump = 0;
var song = new Audio();
song.volume = volume;

function hidePlayer() {
    song.src = "";
    clearInterval(timeInterval);
    player.style.display = 'none';
    m_play_btn.classList.remove('fa-pause');
    m_play_btn.classList.add('fa-play');
}

function loadSong(name, ele) {
    player.style.display = "block";
    song.src = "contents/"+name;
    timeInterval = setInterval(refereshTimer, 1000);
    setTimeout(setDuration, 1000);
    song.play();
    song.loop = true;
    seeker = setInterval(refreshSeek, 1000);
    var classList = document.getElementsByClassName('load_song');
    for (var x = 0; x < classList.length; x++) {
        var elem = classList[x].firstElementChild.classList;
        elem.remove('fa-pause');
        elem.add('fa-play');
    }
    m_play_btn = ele;
    ele.classList.remove('fa-play');
    ele.classList.add('fa-pause');
    play_btn.classList.remove('fa-play');
    play_btn.classList.add('fa-pause');
}

function playSong(ele, e) {
    //var audio = document.getElementById('audio');

    ele.classList.toggle('fa-play');
    ele.classList.toggle('fa-pause');
    m_play_btn.classList.toggle('fa-play');
    m_play_btn.classList.toggle('fa-pause');

    if(song.paused){
        setTimeout(refereshTimer, 100);
        setTimeout(refreshSeek, 100);
        song.play();
        timeInterval = setInterval(refereshTimer, 1000);
        seeker = setInterval(refreshSeek, 1000);
    } else {
        song.pause();
        clearInterval(timeInterval);
        clearInterval(seeker);
    }
}

function muteSong(ele, e) {
    ele.classList.toggle('fa-volume-up');
    ele.classList.toggle('fa-volume-off');

    song.muted = !song.muted;

}

function seek(ele, e) {
    var length = ele.clientWidth;
    var progress = document.getElementById('bar_pro');
    var seeked = e.screenX - (10 * 5);
    var per = seeked / length * 100;
    song.currentTime = (song.duration * ( per.toFixed(1) / 100)).toFixed(1);
    var no = ele.compareDocumentPosition(document.body);
    progress.style.width = per + '%';
}

function volumeChange(ele, child, e) {
    var clicker = document.getElementById('v_clicker');
    var length = ele.clientWidth;
    var progress = child;
    var abs_zero = window.innerWidth - (100 + 8);
    var seeked = e.screenX - abs_zero;
    var per = seeked / length * 100;
    progress.style.width = per + '%';
    clicker.style.left = seeked + 'px' ;
    song.volume = per / 100;
}

function setDuration() {
    var dur = document.getElementById('duration');
    var mins = Math.floor(song.duration / 60);
    var secs = Math.floor(song.duration - (60 * mins));
    if (secs < 10) {
        seconds = '0' + secs;
    } else {
        seconds = secs;
    }
    timer = mins + ':' + seconds;
    dur.innerText = timer;
}

function refereshTimer() {
    var curr_time = document.getElementById('curr_time');
    var max_mins = Math.floor(song.duration / 60);

    if(Math.floor(song.currentTime / 60) < max_mins) {

        var mins = Math.floor(song.currentTime / 60);
        var secs = Math.floor(song.currentTime - (60 * mins));
        if(secs < 10) {
            seconds = '0' + secs;
        } else {
            seconds = secs;
        }
    }

    timer = mins + ':' + seconds;
    curr_time.innerText = timer;
}

function refreshSeek() {
    var seeks = document.getElementById('bar_pro');
    var curr_tym = (song.currentTime / song.duration) * 100;
    seeks.style.width = curr_tym + '%';
}

function upload(e) {
    var file_to = document.getElementById('fileToUpload');
    var hidden = document.getElementById('base');
    var format_div = document.getElementById('format');
    var size_div = document.getElementById('size');
    var spin = document.getElementById('spin');
    var uploader = document.getElementById('uploader');
    var form = document.getElementById('form');
    var health = true;

    var rw_size = file_to.files[0].size / 1024;
    var size = rw_size.toFixed();
    if(size > 1024000) {
        health = false;
    } else {
        health = true;
    }

    // Getting the format
    var filename = file_to.value;
    var file_arr = filename.split('.');
    var lid = file_arr.length - 1;

    if(health) {
        // Starting the actual reading
        var fr = new FileReader();
        fr.readAsDataURL(file_to.files[0]);

        // setting styles
        spin.style.display = 'flex';
        uploader.style.display = 'none';

        fr.onloadend = function (e) {
            hidden.value = e.target.result;
            format_div.value = file_arr[lid];
            size_div.value = size;
            spin.style.display = 'none';
            form.style.display = 'flex';
        }
    } else {
        alert('File exceeds maximum Mb allowed');
    }
}