<?php
include("model/functions.class.php");

function artist(){
    $x = new model ;
    $bdd = $x->connect();

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
        <H1 class="welcome"> <br><br>Artists</H1>
    </div>
    <nav class="container row m-3" aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="http://localhost/Musify-site/home/">Musify</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artists</li>
        </ol>
    </nav>
    ');
    include("view/searchview.php");
    search();       
include("view/allartists.php");
allArtists($x,$bdd);
}
?>
