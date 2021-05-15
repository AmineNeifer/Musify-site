<?php
session_start();
include("../model/functions.class.php");
$x= new model;
$bdd=$x->connect(); 
$x->checkSession($_SESSION['id']);
$usr=$bdd->quote($_SESSION['id']);
$profile=$x->selectUser($bdd,$usr)->fetchObject();
$music= $x->selectMusic($bdd,$profile->artname)->fetchAll();
$post= $x->selectGig($bdd,$usr)->fetchAll();
?>

<head>
    <title>Musify | <?=$_SESSION['id']?></title>
    <link rel="icon" href="../ASSETS/logo.png">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../CSS/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">


</head>
<body>
  <?php
    include("../view/profilestyle.php");
    style($profile->profilepic,$profile->coverpic);
    include("../view/navbar.php");
    NavBar($_SESSION['id']);
  ?>
    <div class="pagenamea">
        <H1 class="welcomea"> <br><br></H1>
    </div>
    <div class="profilepic"></div>
    <div class="container">
    <H1 class="mt-4 row justify-content-md-center"><?=$profile->Fname." ".$profile->Lname;?></H1>
    <H6 class="mt-1 row justify-content-md-center"><?="@".$profile->Username;?></H6>
    <div class="row justify-content-md-center">
    <div class="col-md-auto">
    <a href="editprofile.php" class="mt-4 btn btn-outline-secondary">Edit Profile</a>
    <?php
    if($profile->Admin == 1){
        echo('
    <a href="adminprofile.php" class="mt-4 btn btn-outline-secondary">Admin Parameters</a>
    ');
    }
    ?>
    </div>
    </div>
    </div>
    <hr class="container mt-4">
    <div class="container">
        <div class="card mb-4">
        <form action="../PHP/gig.php" method="POST">
        <div class="card-body">
        <h3 class="card-title d-flex align-items-end"><div class="everpic2"></div> Create Gig </h5>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Gig Title</label>
        <input type="Text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Your Gig Title here ..." required>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
        </div>
        <button class="btn btn-dark d-flex" type="submit">Submit Gig</button>
        </form>
        </div>
        </div>
    </div>
    <div class="container">
    <div class="row justify-content-center">
    <a href="submit.php" class="mb-4 btn btn-dark col-6">Upload Your Music here</a>
    </div>
    </div>
    <hr class="container col-9 mt-4">
    <div class="mt-4 container">
  <div class="row col-md-auto">
    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action d-flex justify-content-center btn-dark active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Feed</a>
      <a class="list-group-item list-group-item-action d-flex justify-content-center btn-dark" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Music</a>
    </div>
  </div>
  <div class="container">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <div class="row-fluid mt-3">
      <?php
      foreach($post as $line)
      echo('<div class="card mt-2 mb-3">
        <div class="card-header">
            '.$line["username"].'
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <h3 class="mb-2">'.$line["title"].'</h3>
                <h5>'.$line["description"].'</h5>
                <small><br></small>
                <footer class="blockquote-footer"><small>Uploaded <cite title="Source Title">'.$line["post"].'</cite></small></footer>
            </blockquote>
        </div>
      </div>');
      ?>
      </div>

      
      </div>

      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
      <div class="row-fluid mt-5">
      <?php
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
function DurTime (e) {
	const {duration,currentTime} = e.srcElement;
	var sec;
	var sec_d;

	// define minutes currentTime
	let min = (currentTime==null)? 0:
	 Math.floor(currentTime/60);
	 min = min <10 ? "0"+min:min;

	// define seconds currentTime
	function get_sec (x) {
		if(Math.floor(x) >= 60){
			
			for (var i = 1; i<=60; i++){
				if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
					sec = Math.floor(x) - (60*i);
					sec = sec <10 ? "0"+sec:sec;
				}
			}
		}else{
		 	sec = Math.floor(x);
		 	sec = sec <10 ? "0"+sec:sec;
		 }
	} 

	get_sec (currentTime,sec);

	// change currentTime DOM
	currTime.innerHTML = min +":"+ sec;

	// define minutes duration
	let min_d = (isNaN(duration) === true)? "0":
		Math.floor(duration/60);
	 min_d = min_d <10 ? "0"+min_d:min_d;


	 function get_sec_d (x) {
		if(Math.floor(x) >= 60){
			
			for (var i = 1; i<=60; i++){
				if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
					sec_d = Math.floor(x) - (60*i);
					sec_d = sec_d <10 ? "0"+sec_d:sec_d;
				}
			}
		}else{
		 	sec_d = (isNaN(duration) === true)? "0":
		 	Math.floor(x);
		 	sec_d = sec_d <10 ? "0"+sec_d:sec_d;
		 }
	} 

	// define seconds duration
	
	get_sec_d (duration);

	// change duration DOM
	durTime.innerHTML = min_d +":"+ sec_d;
		
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
audio.addEventListener("timeupdate",DurTime);
    </script>
');
      }
      ?>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
      <!-- Github -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Section: Social media -->




  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright:
    <a class="text-white" href="#">Musify</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
            </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    


</body>