<?php
function content($music,$post){
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

<div class="mt-4 container">
        <div class="row col-md-auto">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action d-flex justify-content-center btn-dark active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Feed</a>
            <a class="list-group-item list-group-item-action d-flex justify-content-center btn-dark" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Music</a>
                  </div>
        </div>
        <div class="container">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="row-fluid mt-3">
                        ');
      foreach($post as $line){
      echo('<div class="card mt-2 mb-3">
        <div class="card-header">
            '.$line["username"].'
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <h3 class="mb-2">'.$line["title"].'</h3>
                <h5>'.$line["description"].'</h5>
                <small><br></small>
                <footer class="blockquote-footer"><small>Uploaded <cite title="Source Title">'.$line["post"].'</cite></small></footer>
            </blockquote>
        </div>
      </div>');
      }
      echo('
      
                    </div>
                </div>

                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="row-fluid mt-5">
                        ');
                        include('showmusic.php');
                        showMusic($music);
      echo('
                    </div>
                </div>
            </div>
        </div>
        ');
    }
?>