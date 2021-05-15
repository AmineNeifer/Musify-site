<?php
function showMusic($music){
    foreach($music as $line){
        echo('
    <div class="row margin">
    <div class="music-container" id="music-container">
    <div class="music-info">
      <h4 id="title">'.$line["name"].'('.$line["type"].')</h4>
      <div class="progress-container" id="progress-container">
        <div class="progress" id="progress"></div>
      </div>
    </div>

    <audio src="'.$line['song'].'" id="audio"></audio>

    <div class="img-container">
      <img src="'.$line['cover'].'" alt="music-cover" id="cover" />
    </div>
    <div class="mx-3">
    <p class="fw-normal text-light end-0mt-0 mb-0">'.$line["artist"]);
    if(isset($line["feat"])){
      echo(' Ft. '.$line["feat"]);
    }
    echo('
    </p>
    <P class="fw-normal text-light end-0 mt-0 mb-0">'.$line["rdate"].'
    </p>
    </div>
    <div class="navigation d-flex justify-content-center">
    <button id="play" class="action-btn action-btn-big">
      <i class="fas fa-play"></i>
    </button>
    <a class="action-btn" href="'.$line['song'].'" download="'.$line["name"].'">
      <i class="fas fa-download"></i>
    </a>

  </div>


  </div>
  </div>
  </div>
  <script>
      const musicContainer = document.getElementById("music-container");
      const playBtn = document.getElementById("play");
      const prevBtn = document.getElementById("prev");
      const nextBtn = document.getElementById("next");

      const audio = document.getElementById("audio");
      const progress = document.getElementById("progress");
      const progressContainer = document.getElementById("progress-container");
      const title = document.getElementById("title");
      const cover = document.getElementById("cover");
      const currTime = document.querySelector("#currTime");
      const durTime = document.querySelector("#durTime");

      // Play song
      function playSong() {
          musicContainer.classList.add("play");
          playBtn.querySelector("i.fas").classList.remove("fa-play");
          playBtn.querySelector("i.fas").classList.add("fa-pause");

          audio.play();
      }

      // Pause song
      function pauseSong() {
          musicContainer.classList.remove("play");
          playBtn.querySelector("i.fas").classList.add("fa-play");
          playBtn.querySelector("i.fas").classList.remove("fa-pause");

          audio.pause();
      }


      // Update progress bar
      function updateProgress(e) {
          const { duration, currentTime } = e.srcElement;
          const progressPercent = (currentTime / duration) * 100;
          progress.style.width = `${progressPercent}%`;
      }

      // Set progress bar
      function setProgress(e) {
          const width = this.clientWidth;
          const clickX = e.offsetX;
          const duration = audio.duration;

          audio.currentTime = (clickX / width) * duration;
      }

      //get duration & currentTime for Time of song
      function DurTime(e) {
          const { duration, currentTime } = e.srcElement;
          var sec;
          var sec_d;

          // define minutes currentTime
          let min = (currentTime == null) ? 0 :
              Math.floor(currentTime / 60);
          min = min < 10 ? "0" + min : min;

          // define seconds currentTime
          function get_sec(x) {
              if (Math.floor(x) >= 60) {

                  for (var i = 1; i <= 60; i++) {
                      if (Math.floor(x) >= (60 * i) && Math.floor(x) < (60 * (i + 1))) {
                          sec = Math.floor(x) - (60 * i);
                          sec = sec < 10 ? "0" + sec : sec;
                      }
                  }
              } else {
                  sec = Math.floor(x);
                  sec = sec < 10 ? "0" + sec : sec;
              }
          }

          get_sec(currentTime, sec);

          // change currentTime DOM
          currTime.innerHTML = min + ":" + sec;

          // define minutes duration
          let min_d = (isNaN(duration) === true) ? "0" :
              Math.floor(duration / 60);
          min_d = min_d < 10 ? "0" + min_d : min_d;


          function get_sec_d(x) {
              if (Math.floor(x) >= 60) {

                  for (var i = 1; i <= 60; i++) {
                      if (Math.floor(x) >= (60 * i) && Math.floor(x) < (60 * (i + 1))) {
                          sec_d = Math.floor(x) - (60 * i);
                          sec_d = sec_d < 10 ? "0" + sec_d : sec_d;
                      }
                  }
              } else {
                  sec_d = (isNaN(duration) === true) ? "0" :
                      Math.floor(x);
                  sec_d = sec_d < 10 ? "0" + sec_d : sec_d;
              }
          }

          // define seconds duration

          get_sec_d(duration);

          // change duration DOM
          durTime.innerHTML = min_d + ":" + sec_d;

      };

      // Event listeners
      playBtn.addEventListener("click", () => {
          const isPlaying = musicContainer.classList.contains("play");

          if (isPlaying) {
              pauseSong();
          } else {
              playSong();
          }
      });


      // Time/song update
      audio.addEventListener("timeupdate", updateProgress);

      // Click on progress bar
      progressContainer.addEventListener("click", setProgress);

      // Song ends
      audio.addEventListener("ended", nextSong);

      // Time of song
      audio.addEventListener("timeupdate", DurTime);
  </script>
');
    }

}
?>