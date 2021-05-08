<?php
session_start();
if(empty($_SESSION['id'])){
    echo "<script>window.location.href='Login.php';</script>";
    exit;  
} 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Musify</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Musify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="artist.php">Artists</a>
                    <a class="nav-link active" aria-current="page" href="submit.php">Submit</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php?id=<?=$_REQUEST['id']?>">My Profile</a></li>
                            <li><a class="dropdown-item" href="editprofile.php?id=<?=$_REQUEST['id']?>">Profile Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../PHP/logout.php">LogOut</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="pagename">
        <H1 class="welcome"> <br><br>Submit Your Song</H1>
    </div>
    <nav class="container row m-3 " aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
          <li class="breadcrumb-item"><a href="../index.php">Musify</a></li>
          <li class="breadcrumb-item active" aria-current="page">Submit</li>
        </ol>
    </nav>
    <form class="container row m-3 " action="../PHP/uploadsong.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Track Title</label>
                        <input type="text" class="form-control" id="inputName" name="Title" placeholder="Title ..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPrename" class="form-label">Type</label>
                        <input type="text" class="form-control" id="inputPreName" placeholder="Cover/Remix ..." name="Type" required>
                    </div>
                    <div class="col-12">
                        <label for="user" class="form-label">Language</label>
                        <input type="text" class="form-control" id="user" placeholder="English" name="Lang" required>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Song</label>
                        <input type="file" class="form-control" id="inputEmail4" name="music" required>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">CoverArt</label>
                        <input type="File" class="form-control" id="inputPassword4" name="pic" required>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword5" class="form-label">Featured Artists</label>
                        <input type="text" class="form-control" name="feat" id="inputPassword5" placeholder="WG">
                    </div>
                    <div class="col-md-6">
                        <label for="artist" class="form-label">Artist Name</label>
                        <input type="text" class="form-control" id="artist" name="artist"
                            placeholder="Jony" required>
                    </div>
                    <div class="col-md-6">
                        <label for="artisttype" class="form-label">Are You a ?</label>
                        <select id="artisttype" class="form-select" name="role" required>
                            <option selected>Choose...</option>
                            <option>Music Producer</option>
                            <option>Singer</option>
                            <option>Songwriter</option>
                            <option>Instrument Player</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <label for="inputPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="inputPhone" placeholder="23456789">
                    </div>
                    <div class="col-md-3">
                        <label for="inputDate" class="form-label">Release Date</label>
                        <input type="date" name="Release" class="form-control" id="inputDate" min="2021-01-01" required>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                I agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="w-100 btn btn-dark">Upload Track</button>
                    <p class="mt-5 mb-3 text-muted">&copy; Musify 2021</p>
    </form>
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
</body>

</html>