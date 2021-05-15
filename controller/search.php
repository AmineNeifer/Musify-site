<?php
function search($x,$bdd){
    $search = $_REQUEST['search'];
    $art='artists';
    $answer=$x->searchArtist($bdd,$art,$search);
    return $answer;
}
?>