<?php
include("model/functions.class.php");
function artistpro(){
$x= new model;
$bdd=$x->connect(); 
$user=$bdd->quote($_REQUEST['action']);
$profile=$x->selectUser($bdd,$user)->fetchObject();
$music= $x->selectMusic($bdd,$profile->artname)->fetchAll();
$post= $x->selectGig($bdd,$user)->fetchAll();
$x->checkUser($_REQUEST['action']);
include("view/profilestyle.php");
    style($profile->profilepic,$profile->coverpic);
    include("view/profileidentity.php");
    identity($profile);
echo('    <hr class="container mt-4">');
include("view/profilecontent.php");
content($music,$post);
}
?>
