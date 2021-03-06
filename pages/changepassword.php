<?php
session_start();
checkSession
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
                    <a class="nav-link" aria-current="page" href="submit.php">Submit</a>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="editprofile.php">Profile Settings</a></li>
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
        <H1 class="welcome"> <br><br>Edit Profile</H1>
    </div>
    <nav class="container row m-3 " aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
          <li class="breadcrumb-item"><a href="../index.php">Musify</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
        </ol>
    </nav>
    <form class="container row m-3" action="../PHP/passupdate.php" method="POST">
                    <error class="text-danger" id="ghalta"> 
                    </error>

                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Change Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}" title="at least 1 number , 1 uppercase , 1 lowercase . Length[8.15]  " required>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword5" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputPassword5" required>
                    </div>
                    <button type="submit" class="mt-3 submit btn btn-dark">Update Password</button>
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
    ?? 2020 Copyright:
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
