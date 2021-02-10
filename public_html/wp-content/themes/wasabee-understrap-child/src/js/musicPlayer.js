window.onload=function(){
    const musicPlayer = document.getElementById('musicPlayer');
    const playButton = document.getElementById('playButton');
    const volumeRange = document.getElementById('volume');

    const changeVolume = function(){
        musicPlayer.volume = volume.value / 100;
        musicPlayer.volume == 0 ? addMuteIcon() : removeMuteIcon();
    }

    if(volumeRange){
        volumeRange.addEventListener('input', changeVolume);
        volumeRange.addEventListener('change', changeVolume);
    }

    musicPlayer.addEventListener('play', function(){
        playButton.classList.remove('fa-play');
        playButton.classList.add('fa-pause');
    })

    musicPlayer.addEventListener('pause', function(){
        playButton.classList.remove('fa-pause');
        playButton.classList.add('fa-play');
    })
}

function playMusic() {
    const musicPlayer = document.getElementById('musicPlayer');

    musicPlayer.paused ? musicPlayer.play() : musicPlayer.pause();
}

let saveVolume = 0.3;

function muteMusic() {
    const musicPlayer = document.getElementById('musicPlayer');

    if(musicPlayer.volume > 0) {
        addMuteIcon();
    } else {
        removeMuteIcon();
        musicPlayer.volume = saveVolume;
    }
}

function addMuteIcon() {
    saveVolume = musicPlayer.volume;
    muteButton.classList.remove('fa-volume-up');
    muteButton.classList.add('fa-volume-off');
    musicPlayer.volume = 0;
}

function removeMuteIcon() {
    muteButton.classList.remove('fa-volume-off');
    muteButton.classList.add('fa-volume-up');
}
