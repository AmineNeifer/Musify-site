<?php
public class model {
    function connect(){
        include_once("../PHP/connect.php");
        $bdd = connect();
        return $bdd;
    }
    function selectAll($table){
        $sql = "SELECT * FROM $table";
        $answer = $bdd->query($sql) or die ($bdd->errorInfo()[2]);
        $tab = $answer->fetchall();
        return $tab;
    }
    function selectUser($user){
        $usr = "SELECT * FROM users WHERE username LIKE $user";
        $answer=$bdd->query($usr);
        $profile =$answer-> fetchObject();
        return $profile;
    }
}
?>