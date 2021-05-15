<?php
function allArtists($x,$bdd){
    $table="artists";
    $tab = $x->selectAll($bdd,$table)->fetchAll();


    echo('    <div class="container">
    <div class="d-flex row-fluid ">');
        
        foreach($tab as $line){
        echo('<div class="col-sm-3 m-3">
        <div class="card-columns-fluid">
        <div class="card" style="width: 18rem;">
            <img src="'.$line["profilepic"].'" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">'.$line["artname"].'</h5>
                <p class="card-text">'.$line["description"].'</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">'.$line["username"].'</li>
                <li class="list-group-item">'.$line["role"].'</li>
            </ul>
            <div class="card-body">
                <a href="http://localhost/Musify-site/'.$line["username"].'/artist" class="btn btn-dark">Profile</a>
            </div>
        </div>
        </div>
        </div>');
        }
        echo('
    </div>
</div>
');
}
?>