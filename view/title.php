<?php
function title($x,$y){
    if($x=='home'){
        echo('    <title>Musify</title>
        ');
    }
    else if($x =='upload'){
        echo('    <title>Musify | '.$y.' </title>
        ');
    }
    else{
        echo('    <title>Musify | '.$x.'</title>
        ');
    }
}
?>