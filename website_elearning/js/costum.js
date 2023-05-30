function playVideo(videoId) {
    var video = document.getElementById(videoId);
    video.play();
  }
  
  function pauseVideo(videoId) {
    var video = document.getElementById(videoId);
    video.pause();
  }
  
  function stopVideo(videoId) {
    var video = document.getElementById(videoId);
    video.pause();
    video.currentTime = 0;
  }
  
  function fastForward(videoId, seconds) {
    var video = document.getElementById(videoId);
    video.currentTime += seconds;
  }
  
  function rewind(videoId, seconds) {
    var video = document.getElementById(videoId);
    video.currentTime -= seconds;
  }
  