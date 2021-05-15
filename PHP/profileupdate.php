<html>
    <head>
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
                    <a class="nav-link active" aria-current="page" href="../pages/artist.php">Artists</a>
                    <a class="nav-link" href="../pages/submit.php">Submit</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../pages/profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="../pages/editprofile.php">Profile Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="pagename">
        <H1 class="welcome"> <br><br>Profile Update</H1>
    </div>
    <nav class="container row m-3" aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="../index.php">Musify</a></li>
            <li class="breadcrumb-item"><a href="../pages/profile.php">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile Update</li>
        </ol>
    </nav>
<?php
session_start();
if(empty($_SESSION['id'])){
    echo "<script>window.location.href='Login.php';</script>";
    exit;  
}
include_once("connect.php");
$bdd = connect();
$fname = $bdd->quote($_REQUEST['Fname']);
$lname = $bdd->quote($_REQUEST['Lname']);
$id=$_REQUEST['Uname'];
$uname = $bdd->quote($_REQUEST['Uname']);
$email = $bdd->quote($_REQUEST['email']);
$artname = $bdd->quote($_REQUEST['artist']);
$role = $bdd->quote($_REQUEST['role']);
$phone = $bdd->quote($_REQUEST['phone']);
$sex = $bdd->quote($_REQUEST['sex']);
$birth = $bdd->quote($_REQUEST['birth']);
$user='users';

createUserFiles()
$targetprofile = "../Uploads/images/Profile/$uname/profile/";
$pp = $targetprofile.basename($_FILES['pp']['name']);
$ext = strtolower(pathinfo($pp,PATHINFO_EXTENSION));

$targetcover = "../Uploads/images/Profile/$uname/cover/";
$pc = $targetcover.basename($_FILES['pc']['name']);
$ext2 = strtolower(pathinfo($pc,PATHINFO_EXTENSION));
$cover = $bdd->quote($pc);
$profile = $bdd->quote($pp);

if((!isset($_FILES['pp']) || $_FILES['pp']['error'] == UPLOAD_ERR_NO_FILE)&&(!isset($_FILES['pc']) || $_FILES['pc']['error'] == UPLOAD_ERR_NO_FILE)){
    $ins = "UPDATE `users` SET `Fname` = $fname, `Lname` = $lname, `email` = $email, `artname` = $artname, `job` = $role, `tel` = $phone, `sex` = $sex, `birth` = $birth WHERE `users`.`Username` = $uname";
    $bdd->exec($ins);
    echo('<div class="m-4 alert alert-success" role="alert">
    Profile Updated Successfully !
    </div>
    <a href="../pages/profile.php?id='.$id.'" class=" m-4 btn btn-success">Back To Profil page</a>
    ');    

}
else if(!isset($_FILES['pp']) || $_FILES['pp']['error'] == UPLOAD_ERR_NO_FILE) {
    $ins = "UPDATE `users` SET `Fname` = $fname, `Lname` = $lname, `email` = $email, `artname` = $artname, `job` = $role, `tel` = $phone, `sex` = $sex, `birth` = $birth, `coverpic` = $cover WHERE `users`.`Username` = $uname";
    if($ext2!="jpg" && $ext2!="png" && $ext2!="jpeg"){
    die('<div class="m-4 alert alert-danger" role="alert">
Cover Picture JPG/JPEG or PNG Only !
</div>
<a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
<br>
');
}
else if($_FILES["pc"]["size"] > 10000000){
    die('<div class="m-4 alert alert-danger" role="alert">
Cover Pic Too Large ! must be Less than 10Mb
</div>
<a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
');
}
    $bdd->exec($ins);
if (move_uploaded_file($_FILES['pc']['tmp_name'],$pc)) {
    echo('<div class="m-4 alert alert-success" role="alert">
    Profile Updated Successfully !
    </div>
    <a href="../pages/profile.php?id='.$id.'" class=" m-4 btn btn-success">Back To Profile page</a>
    ');    
} else {
    echo('<div class="m-4 alert alert-danger" role="alert">
    Error uploading Your File ! 
    </div>
    <a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
    ');    
}

}
else if(!isset($_FILES['pc']) || $_FILES['pc']['error'] == UPLOAD_ERR_NO_FILE) {
    $ins = "UPDATE `users` SET `Fname` = $fname, `Lname` = $lname, `email` = $email, `artname` = $artname, `job` = $role, `tel` = $phone, `sex` = $sex, `birth` = $birth, `profilepic` = $profile WHERE `users`.`Username` = $uname";
    if($ext!="jpg" && $ext!="png" && $ext!="jpeg"){
        die('<div class="m-4 alert alert-danger" role="alert">
    Profile Picture : JPG/JPEG Or PNG Only !
    </div>
    <a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
    <br>
    ');
    }
    else if($_FILES["pp"]["size"] > 10000000){
        die('<div class="m-4 alert alert-danger" role="alert">
    Profile Pic Too Large ! must be Less than 10Mb
    </div>
    <a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
    ');
    }    
    $bdd->exec($ins);
    if (move_uploaded_file($_FILES['pp']['tmp_name'],$pp)) {
        echo('<div class="m-4 alert alert-success" role="alert">
        Profile Updated Successfully !
        </div>
        <a href="../pages/profile.php?id='.$id.'" class=" m-4 btn btn-success">Back To Profil page</a>
        ');    
    } else {
        echo('<div class="m-4 alert alert-danger" role="alert">
        Error uploading Your File ! 
        </div>
        <a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
        ');    
    }
    
}
else{
$ins = "UPDATE `users` SET `Fname` = $fname, `Lname` = $lname, `email` = $email, `artname` = $artname, `job` = $role, `tel` = $phone, `sex` = $sex, `birth` = $birth, `profilepic` = $profile, `coverpic` = $cover WHERE `users`.`Username` = $uname";

if($ext!="jpg" && $ext!="png" && $ext!="jpeg"){
    die('<div class="m-4 alert alert-danger" role="alert">
Profile Picture : JPG/JPEG Or PNG Only !
</div>
<a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
<br>
');
}
else if($_FILES["pp"]["size"] > 10000000){
    die('<div class="m-4 alert alert-danger" role="alert">
Profile Pic Too Large ! must be Less than 10Mb
</div>
<a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
');
}else if($ext2!="jpg" && $ext2!="png" && $ext2!="jpeg"){
    die('<div class="m-4 alert alert-danger" role="alert">
Cover Picture JPG/JPEG or PNG Only !
</div>
<a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
<br>
');
}
else if($_FILES["pc"]["size"] > 10000000){
    die('<div class="m-4 alert alert-danger" role="alert">
Cover Pic Too Large ! must be Less than 10Mb
</div>
<a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
');
}
$bdd->exec($ins);
if (move_uploaded_file($_FILES['pp']['tmp_name'],$pp) && move_uploaded_file($_FILES['pc']['tmp_name'],$pc)) {
    echo('<div class="m-4 alert alert-success" role="alert">
    Profile Updated Successfully !
    </div>
    <a href="../pages/profile.php?id='.$id.'" class=" m-4 btn btn-success">Back To Profil page</a>
    ');    
} else {
    echo('<div class="m-4 alert alert-danger" role="alert">
    Error uploading Your File ! 
    </div>
    <a href="../pages/editprofile.php?id='.$id.'" class=" m-4 btn btn-danger">Back To Upload page</a>
    ');    
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
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
