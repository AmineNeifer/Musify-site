<?php
function searchpage(){
echo('
<div class="pagename">
        <H1 class="welcome"> <br><br>Search Results</H1>
    </div>
    <nav class="container row m-3" aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="http://localhost/Musify-site/home/">Musify</a></li>
            <li class="breadcrumb-item"><a href="http://localhost/Musify-site/artist/">Artists</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>');
    include("model/functions.class.php");
    $x = new Model;
    $bdd = $x->connect();
    include("controller/search.php");
    $answer=search($x,$bdd);
if($answer->rowCount()>=1){
$tab = $answer->fetchall();
include("view/searchresult.php");
showresult($tab);
} else {
    echo('<div class="m-4 alert alert-warning" role="alert">
    Artist Not Found !
  </div>
  <a href="../pages/artist.php" class=" m-4 btn btn-danger">Back To artist page</a>
  ') ;
}
}
?>
