<?php
session_start();
include_once("../PHP/connect.php");
$bdd = connect();
$user=$bdd->quote($_REQUEST['ref']);
if(!empty($_SESSION['id']) && $_REQUEST['ref']==$_SESSION['id']){
    echo "<script>window.location.href='profile.php';</script>";
    exit;  
}
$x=$bdd->quote($profile->artname);
$artist="SELECT * FROM music WHERE (artist LIKE $x) OR (feat LIKE $x)";
$res=$bdd->query($artist);
$music =$res ->fetchAll();
$gig = "SELECT * FROM gigs WHERE username LIKE $user";
$answergig=$bdd->query($gig);
$post=$answergig->fetchAll();
?>

<head>
<title>Musify | <?=$_REQUEST['ref']?></title>
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
    <style>
    .pagenamea{
    top: 0px;
    width: 100%;
    height: 80%;
    margin: 0px;
    background-size: 100% 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-image: url("<?=$profile->coverpic;?>");
    }
    .profilepic{
    background-image: url("<?=$profile->profilepic;?>");
    background-size: 100% 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 180px;
    height: 180px;
    display: flex;
    justify-self: center;
    margin-left: auto;
    margin-right: auto;
    border-radius: 50%;
    z-index: 99999;
    margin-top: -60px;
    }
    .everpic{
    background-image: url("<?=$profile->profilepic;?>");
    background-size: 100% 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 20px;
    height: 20px;
    display: flex;
    justify-self: center;
    border-radius: 50%;
    z-index: 99999;
    margin-right:4px;
    }
    .everpic2{
    background-image: url("<?=$profile->profilepic;?>");
    background-size: 100% 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 40px;
    height: 40px;
    display: flex;
    justify-self: center;
    border-radius: 50%;
    z-index: 99999;
    margin-right:4px;
    }
    @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
    .music-container {
  background-color: #858796;
  border-radius: 15px;
  box-shadow: 0 5px 5px 0 #85858598;
  display: flex;
  padding: 20px 30px;
  position: relative;
  margin: 100px 0;
  z-index: 10;
}

.img-container {
  position: relative;
  width: 110px;
}


.img-container img {
  border-radius: 50%;
  object-fit: cover;
  height: 110px;
  width: inherit;
  position: absolute;
  bottom: 0;
  left: 0;
  animation: rotate 3s linear infinite;

  animation-play-state: paused;
}

.music-container.play .img-container img {
  animation-play-state: running;
}

@keyframes rotate {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

.navigation {
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1;
}

.action-btn {
  background-color: rgba(255, 255, 255, 0);
  border: 0;
  color: #f8f9fc;
  font-size: 20px;
  cursor: pointer;
  padding: 10px;
  margin: 0 20px;
  transition : ease 0.3s all;
}
.action-btn:hover {
  background-color: rgba(255, 255, 255, 0);
  color: #5a5c69;
}

.action-btn.action-btn-big {
  color: #f8f9fc;
  font-size: 30px;
}
.action-btn.action-btn-big:hover {
  color: #5a5c69;
  font-size: 30px;
}
.action-btn:focus {
  outline: 0;
}

.music-info {
  background-color: #8587967c;
  color : #5a5c69;
  border-radius: 15px 15px 0 0;
  position: absolute;
  top: 0;
  left: 20px;
  width: calc(100% - 40px);
  padding: 10px 10px 10px 150px;
  opacity: 0;
  transform: translateY(0%);
  transition: transform 0.3s ease-in, opacity 0.3s ease-in;
  z-index: 0;
}

.music-container.play .music-info {
  opacity: 1;
  transform: translateY(-100%);
}

.music-info h4 {
  margin: 0;
}

.progress-container {
  background: #858796;
  border-radius: 5px;
  cursor: pointer;
  margin: 10px 0;
  height: 4px;
  width: 100%;
}

.progress {
  background-color: #f8f9fc;
  border-radius: 5px;
  height: 100%;
  width: 0%;
  transition: width 0.1s linear;
}

.margin{
    margin-top:70px;
}
    


    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Musify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="artist.php">Artists</a>
                    <a class="nav-link" href="submit.php">Submit</a>
                    <?php
                    if(empty($_SESSION['id'])){
                        echo('
                        <a class="nav-link" href="Login.php">Login</a>');
                    }
                    if(!empty($_SESSION['id'])){
                        echo('
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item d-flex " href="profile.php"><div class="everpic"></div>My Profile</a></li>
                            <li><a class="dropdown-item" href="editprofile.php">Profile Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../PHP/logout.php">LogOut</a></li>
                        </ul>
                        </li>');
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="pagenamea">
        <H1 class="welcomea"> <br><br></H1>
    </div>
    <div class="profilepic"></div>
    <div class="container">
    <H1 class="mt-4 row justify-content-md-center"><?=$profile->Fname." ".$profile->Lname;?></H1>
    <H6 class="mt-1 row justify-content-md-center"><?="@".$profile->Username;?></H6>
    </div>
    <hr class="container mt-4">
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