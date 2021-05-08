<html>
    <head>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                    <a class="nav-link active" aria-current="page" href="../pages/artist.php">Artists</a>
                    <a class="nav-link" href="../pages/submit.php">Submit</a>
                    <a class="nav-link" href="../pages/Login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="pagename">
        <H1 class="welcome"> <br><br>Search Results</H1>
    </div>
    <nav class="container row m-3" aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="../index.php">Musify</a></li>
            <li class="breadcrumb-item"><a href="../pages/artist.php">Artists</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>
    </body>
</html>
<?php
session_start();
include_once("connect.php");
$bdd = connect();
$fname = $bdd->quote($_REQUEST['Fname']);
$lname = $bdd->quote($_REQUEST['Lname']);
$uname = $bdd->quote($_REQUEST['Uname']);
$email = $bdd->quote($_REQUEST['email']);
$password = $bdd->quote(password_hash($_REQUEST['password'],PASSWORD_DEFAULT));
$artname = $bdd->quote($_REQUEST['artist']);
$role = $bdd->quote($_REQUEST['role']);
$phone = $bdd->quote($_REQUEST['phone']);
$sex = $bdd->quote($_REQUEST['sex']);
$birth = $bdd->quote($_REQUEST['birth']);
$user='users';
$ins = "INSERT INTO $user (`Fname`, `Lname`, `Username`, `email`, `password`, `artname`, `job`, `tel`, `sex`, `birth` , `Admin`) VALUES ($fname,$lname,$uname,$email,$password,$artname,$role,$phone,$sex,$birth , 0)";
$sql ="SELECT * FROM $user WHERE username LIKE $uname";
$sql2 = "SELECT * FROM $user WHERE email LIKE $email";
$usanswer = $bdd -> query($sql);
$emanswer = $bdd -> query($sql2);
if($usanswer-> rowCount()>0){
    echo('<div class="m-4 alert alert-warning" role="alert">
    '.$uname.' Already Exists ! 
  </div>
  <a href="../pages/login.php" class=" m-4 btn btn-danger">Back To Login page</a>
  ') ;
} else if($emanswer-> rowCount()>0){
    echo('<div class="m-4 alert alert-warning" role="alert">
    '.$email.' Already Exists ! 
  </div>
  <a href="../pages/login.php" class=" m-4 btn btn-danger">Back To Login page</a>
  ') ;
}else{
$bdd->exec($ins) or die ($bdd->errorInfo()[2]);
$_SESSION['id']=$uname;
if(!empty($_SERVER['HTTP_REFERER'])){
    $url=$_SERVER['HTTP_REFERER'];
    echo "<script>history.go(-2);</script>";
    }else{
    header("location:../pages/profile.php");
    }
}
}
?>
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
