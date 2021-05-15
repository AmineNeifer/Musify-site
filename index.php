<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<?php
include("view/title.php");
title($_REQUEST['action'],$_REQUEST['oxy']);
?>
    <link rel="icon" href="http://localhost/Musify-site/ASSETS/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="CSS/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

</head>

<body>
    <style>
        <?php
        include("CSS/styles.css")
        ?>
    </style>
<?php
include("view/navbar.php");
NavBar($_SESSION['id']);
if($_REQUEST['action']=='home'){
    include("pages/home.php");
    home();
}
elseif($_REQUEST['action']=='artist'){
    include("pages/artist.php");
    artist();
}
elseif($_REQUEST['action']=='search'){
    include("PHP/search.php");
    searchpage();
}
elseif($_REQUEST['oxy']=='artist' && $_REQUEST['action']!=$_SESSION['id']){
    include("pages/artistprofile.php");
    artistpro();
}
elseif($_REQUEST['action']=='upload' && $_REQUEST['oxy']==''){
    include("pages/submit.php");
    submit();
}
elseif($_REQUEST['action']=='upload' && $_REQUEST['oxy']=='form'){
    include("pages/Formupload.php");
    formsong();
}elseif(empty($_REQUEST['oxy'])){
    include("model/functions.class.php");
    $x = new model ;
    $bdd = $x->connect();
    $user=$bdd->quote($_REQUEST['action']);
    if($x->selectUser($bdd,$user)->rowCount()>0){
        $x->checkuserartist($_SESSION['id'],$_REQUEST['action']);
    }
}
?>
    <!-- Footer -->
    <?php
include("view/footer.php");
Footer();
?>
<!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
            </script>
    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost/Musify-site/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/Musify-site/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
