<?php
include("model/functions.class.php");
function home(){
    $x= new model;
    $bdd=$x->connect();
    echo('    
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

    <div class="pagename">
    <H1 class="welcome"> <br><br>Musify</H1>
</div>
');
include("view/profilestyle.php");

include('view/allartists.php');
$table="music";
$music=$x->selectAll($bdd,$table)->fetchAll();
include('view/showmusic.php');
echo('<h1 class="container mt-4 text-dark">Music</h1>
    <div class="container col-6" style="margin-top:-80px;">');
showMusic($music);
echo('</div>');
musicstyle();
allArtists($x,$bdd);

}
?>