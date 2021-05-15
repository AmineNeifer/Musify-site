<?php
class model {
    function connect(){
        include_once("PHP/connect.php");
        $bdd = connect();
        return $bdd;
    }
    function selectAll($bdd,$table){
        $sql = "SELECT * FROM $table";
        $answer = $bdd->query($sql) or die ($bdd->errorInfo()[2]);
        return $answer;
    }
    function selectUser($bdd,$user){
        $usr = "SELECT * FROM users WHERE username LIKE $user";
        $answer=$bdd->query($usr);
        return $answer;
    }
    function selectMusic($bdd,$artname){
        $x=$bdd->quote($artname);
        $artist="SELECT * FROM music WHERE (artist LIKE $x) OR (feat LIKE $x)";
        $res=$bdd->query($artist);
        return $res;
    }
    function selectGig($bdd,$user)
    {
        $gig = "SELECT * FROM gigs WHERE username LIKE $user";
        $answergig=$bdd->query($gig);
        return $answergig;
    }
    function checkSession($x)
    {
        if(empty($x)){
            echo "<script>window.location.href='http://localhost/Musify-site/login/';</script>";
            exit;  
        }         
    }
    function checkuserartist($x,$ref)
    {
        if($x==$ref){
            echo "<script>window.location.href='http://localhost/Musify-site/$ref/profile';</script>";
            exit;  
        }
        else{
            echo "<script>window.location.href='http://localhost/Musify-site/$ref/artist';</script>";
            exit;  
        }
    }
    function checkUser($ref)
    {
        if(!empty($_SESSION['id']) && $ref==$_SESSION['id']){
            echo "<script>window.location.href='http://localhost/Musify-site/$ref/profile';</script>";
            exit;  
        }        
    }
    function checkAdmin($admin){
        if($admin==0){
            echo "<script>window.location.href='../PHP/forbidden.php';</script>";
            exit;
        }         
    }
    function lastGig(){
        $l="SELECT * FROM gigs WHERE post LIKE (SELECT MAX(post) FROM gigs)";
        $answerl=$bdd->query($l);
        return $answerl;
    }
    function selectRole($role){
        $pro="SELECT * FROM artists WHERE role like $role";
        $prod=$bdd->query($pro);
        return $prod;
    }
    function selectSex($s){
        $ml="SELECT * FROM users WHERE sex LIKE $s";
        $mal=$bdd->query($ml);
        Return $mal;
    }
    function selectEmail($bdd,$email){
        $sql2 = "SELECT * FROM users WHERE email LIKE $email";
        $emanswer = $bdd -> query($sql2);
        return $emanswer;
    }
    function insertUser($fname,$lname,$uname,$email,$password,$artname,$role,$phone,$sex,$birth){
        $ins = "INSERT INTO $user (`Fname`, `Lname`, `Username`, `email`, `password`, `artname`, `job`, `tel`, `sex`, `birth` , `Admin`) VALUES ($fname,$lname,$uname,$email,$password,$artname,$role,$phone,$sex,$birth , 0)";
        $bdd->exec($ins) or die ($bdd->errorInfo()[2]);
    }
    function createSession($user){
        $_SESSION['id']=$user;
    }
    function createAdminsess($admin){
        $_SESSION['admin']=$admin;
    }
    function Redirect(){
        if(!empty($_SERVER['HTTP_REFERER'])){
            $url=$_SERVER['HTTP_REFERER'];
            echo "<script>history.go(-2);</script>";
        }else{
            header("location:../pages/profile.php");
            
        }
    }
    function insertGig($uname, $title, $desc){
        $ins = "INSERT INTO `gigs` (`username`, `title`, `description`, `post`) VALUES ($uname, $title, $desc, SYSDATE())";
        $bdd->exec($ins);
    }
    function updatePassword($password,$user){
        $ins = "UPDATE `users` SET `password` = $password WHERE `users`.`Username` = $user";
        $bdd->exec($ins) or die ($bdd->errorInfo()[2]);

    }
    function createUserFiles($uname){
        if(!file_exists("../Uploads/images/Profile/$uname")){
            mkdir("../Uploads/images/Profile/$uname");
        }  
        if(!file_exists("../Uploads/images/Profile/$uname/profile")){
            mkdir("../Uploads/images/Profile/$uname/profile");
        }
        if(!file_exists("../Uploads/images/Profile/$uname/cover")){
            mkdir("../Uploads/images/Profile/$uname/cover");
        }                  
    }
    function updateProfileData($fname,$lname,$uname,$email,$artname,$role,$phone,$sex,$birth){
        $ins = "UPDATE `users` SET `Fname` = $fname, `Lname` = $lname, `email` = $email, `artname` = $artname, `job` = $role, `tel` = $phone, `sex` = $sex, `birth` = $birth WHERE `users`.`Username` = $uname";
        $bdd->exec($ins);
    }
    function updateProfilePic($profile,$ext,$uname,$pp,$filesize,$filetmpname){
        $ins = "UPDATE `users` SET `profilepic` = $profile WHERE `users`.`Username` = $uname";
        if($ext!="jpg" && $ext!="png" && $ext!="jpeg"){
        return -1 ;
        }
        else if($filesize > 10000000){
            return -2 ;
        }    
        if (move_uploaded_file($filetmpname,$pp)) {
            $bdd->exec($ins);
            return 0 ;
        } else {
            return -3 ;    
        }
    }
    function updateCoverPic($cover,$ext,$uname,$pc,$filesize,$filetmpname){
        $ins = "UPDATE `users` SET `coverpic` = $cover WHERE `users`.`Username` = $uname";
        if($ext!="jpg" && $ext!="png" && $ext!="jpeg"){
        return -1 ;
        }
        else if($filesize > 10000000){
            return -2 ;
        }    
        if (move_uploaded_file($filetmpname,$pc)) {
            $bdd->exec($ins);
            return 0 ;
        } else {
            return -3 ;    
        }
    }
    function searchArtist($bdd,$art,$search){
        $sql = "SELECT * FROM $art WHERE artname LIKE '%$search%'";
        $answer = $bdd->query($sql) or die ($bdd->errorInfo()[2]);
        return $answer;
    }
    function updateArtists(){
        $del = "DELETE FROM `artists`";
        $ins = "INSERT INTO `artists` (`username`,`artname`,`role`,`profilepic`) SELECT username , artname , job , profilepic FROM users ";
        $fas= $bdd->exec($del);
        $answer = $bdd->exec($ins) ;
    }
    function createArtistFiles(){
        if(!file_exists("../Uploads/songs/$artname")){
            mkdir("../Uploads/songs/$artname");
        }
        if(!file_exists("../Uploads/images/artcovers/$artname")){
            mkdir("../Uploads/images/artcovers/$artname");
        }                    
    }
    function songdata($title, $type, $lang, $artname, $feat, $release){
        $ins="INSERT INTO `music` (`name`, `type`, `lang`, `artist`, `feat`, `rdate`) VALUES ($title, $type, $lang, $artname, $feat, $release)";
        $answer = $bdd->exec($ins) ;
    }
    function uploadSong($ext,$song,$file,$songsize,$songtmp){
        $ins="INSERT INTO `music` (`song`) VALUES ($song)";
        if($ext!="mp3"){
            return -1;
        }
        else if($songsize > 50000000){
            return -2;
        }   
        if (move_uploaded_file($songtmp,$file)) {
            $answer = $bdd->exec($ins) ;
            return 0;
        } else {
            return -3;
        }        
    }
    function uploadPic($ext,$image,$pic,$picsize,$pictmp){
        $ins="INSERT INTO `music` (`cover`) VALUES ($image)";
        if($ext!="jpg" && $ext!="png" && $ext!="jpeg"){
            return -1;
        }
        else if($picsize > 10000000){
            return -2;
        }   
        if (move_uploaded_file($pictmp,$pic)) {
            $answer = $bdd->exec($ins) ;
            return 0;
        } else {
            return -3;
        }        
    }
}
?>