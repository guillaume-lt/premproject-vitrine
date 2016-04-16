var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
player = new YT.Player('video_home', {
        height: '100%',
        width: '100%',
        playerVars : {
                  'autoplay' : 1,
                  'rel' : 0,
                  'showinfo' : 0,
                  'showsearch' : 0,
                  'controls' : 0,
                  'loop' : 1,
                  'enablejsapi' : 1,
                  'playlist': 'QgmKXBlLp8o'
                },
        videoId: 'QgmKXBlLp8o',
        events: {
            'onReady': onPlayerReady
            }
       });
}

function onPlayerReady() {
    if (!player.isMuted()) {
        player.mute();
        undoMuteSetting();
    }
    player.playVideo();
}

function undoMuteSetting() {
    var dummyPlayer;
    var dummyElement = document.createElement('div');
    dummyElement.id = 'dummy-player';
    dummyElement.style.display = 'none';
    document.body.appendChild(dummyElement);
    
    function onDummyPlayerReady() {
      
        dummyPlayer.playVideo();
        dummyPlayer.unMute();
        
        setTimeout(function() {
            var iframe = document.getElementById('dummy-player');
            iframe.parentElement.removeChild(iframe);
        }, 2000);
    }
  
}
