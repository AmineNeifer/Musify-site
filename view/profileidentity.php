<?php
function identity($profile){
    echo('    <div class="pagenamea">
    <H1 class="welcomea"> <br><br></H1>
</div>
<div class="profilepic"></div>
<div class="container">
    <H1 class="mt-4 row justify-content-md-center">
        '.$profile->Fname." ".$profile->Lname.'
    </H1>
    <H6 class="mt-1 row justify-content-md-center">
        '."@".$profile->Username.'
    </H6>
</div>
');
}
?>