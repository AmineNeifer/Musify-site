<?php
session_start();
include_once("../PHP/connect.php");
$bdd = connect();
checkSession
checkAdmin
lastgig
$last=$answerl->fetchObject();
$x=$bdd->quote($last->username);
selectuser
$profile=$answerprox->fetchObject();
selectAll(gig)

selectAll(users)

selectAll(music)

selectAll(artist)

if($answermusic->rowCount()==0){
    $per=-1;
}else{
    $per= ($answerartists->rowCount()/$answermusic->rowCount())*100;
}
$precent = number_format((float)$per, 1, '.', '');
$prec = $precent. '%';

$us = $answeruser->fetchAll();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Musify | Admin</title>
    <link rel="icon" href="../ASSETS/logo.png">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../CSS/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>

<body id="page-top">
    <style>
            .profilepic{
    background-image: url("<?=$profile->profilepic;?>");
    background-size: 100% 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 70px;
    height: 70px;
    display: flex;
    justify-self: center;
    margin-left: auto;
    margin-right: auto;
    border-radius: 50%;
    z-index: 99999;
    }

    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Musify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="artist.php">Artists</a>
                    <a class="nav-link" href="submit.php">Submit</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="editprofile.php">Profile Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../PHP/logout.php">LogOut</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-th-large"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Musify <sup>TM</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="adminprofile.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Main Screens:</h6>
                        <a class="collapse-item" href="../index.php">Home Page</a>
                        <a class="collapse-item" href="login.php">Login</a>
                        <a class="collapse-item" href="artist.php">artists</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="Formupload.php">Upload Song Form</a>
                        <a class="collapse-item" href="profile.php">User Profile</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="songs.php">
                    <i class="fas fa-fw fa-music"></i>
                    <span>All Songs</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="container row m-3" aria-label="breadcrumb">
                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb-item"><a href="../index.php">Musify</a></li>
                    <li class="breadcrumb-item"><a href="adminprofile.php.php">Admin Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
            </nav>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <form action="../PHP/update.php" method="POST">
                        <button class="d-none d-sm-inline-block btn btn-primary shadow-sm" type="submit"> <i
                                class="fas fa-download fa-sm text-white-50"></i> Update DB</button>
                    </form>

                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Atists (Total)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo($answerartists->rowCount()); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Gigs (Total)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo($answergig->rowCount()); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-guitar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Artists Per
                                            Songs
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo($precent); ?>%
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: <?php echo $prec;?>" aria-valuenow="<?=$precent?>"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Music (Total)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo($answermusic->rowCount()); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-music fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-4 mb-4 container col-11">
                <h1 class="mx-4">Users :</h1>
                <div class="row d-flex justify-content-evenly">
                <table class="col-11 table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">UserName</th>
      <th scope="col">mail</th>
      <th scope="col">artist</th>
      <th scope="col">Role</th>
      <th scope="col">Phone</th>
      <th scope="col">Sex</th>
      <th scope="col">Birth</th>
      <th scope="col">Admin</th>
      <th scope="col">Profile</th>
      <th scope="col">Cover</th>


    </tr>
  </thead>
  <tbody>
  <?php
  foreach($us as $line){
    echo('<tr>
      <td>'.$line['Fname'].'</td>
      <td>'.$line['Lname'].'</td>
      <th scope="row">'.$line['Username'].'</th>
      <td>'.$line['email'].'</td>
      <td>'.$line['artname'].'</td>
      <td>'.$line['job'].'</td>
      <td>'.$line['tel'].'</td>
      <td>'.$line['sex'].'</td>
      <td>'.$line['birth'].'</td>
      <td>');
      if($line['Admin']==1){
          echo('<i class="text-success fas fa-crown"></i>');
      }
      else{
        echo('<i class="text-secondary fas fa-crown"></i>');
    }

      echo('</td>
      <td><img src="'.$line['profilepic'].'" alt="profile" width="50" height="50"></td>
      <td><img src="'.$line['coverpic'].'" alt="profile" width="50" height="50"></td>
    </tr>');
  }
    ?>
  </tbody>
</table>

                </div>
                <hr class="mt-4 mb-4 container col-11">
                <h1 class="mx-4">Users :</h1>
                <div class="row d-flex justify-content-evenly">
                <table class="col-11 table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">UserName</th>
      <th scope="col">mail</th>
      <th scope="col">artist</th>
      <th scope="col">Role</th>
      <th scope="col">Phone</th>
      <th scope="col">Sex</th>
      <th scope="col">Birth</th>
      <th scope="col">Admin</th>
      <th scope="col">Profile</th>
      <th scope="col">Cover</th>


    </tr>
  </thead>
  <tbody>
  <?php
  foreach($us as $line){
    echo('<tr>
      <td>'.$line['Fname'].'</td>
      <td>'.$line['Lname'].'</td>
      <th scope="row">'.$line['Username'].'</th>
      <td>'.$line['email'].'</td>
      <td>'.$line['artname'].'</td>
      <td>'.$line['job'].'</td>
      <td>'.$line['tel'].'</td>
      <td>'.$line['sex'].'</td>
      <td>'.$line['birth'].'</td>
      <td>');
      if($line['Admin']==1){
          echo('<i class="text-success fas fa-crown"></i>');
      }
      else{
        echo('<i class="text-secondary fas fa-crown"></i>');
    }

      echo('</td>
      <td><img src="'.$line['profilepic'].'" alt="profile" width="50" height="50"></td>
      <td><img src="'.$line['coverpic'].'" alt="profile" width="50" height="50"></td>
    </tr>');
  }
    ?>
  </tbody>
</table>
            
                </div>


                </div>

            </div>
            
        </div>
        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
            </script>
        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../JS/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../JS/demo/chart-area-demo.js"></script>




</body>

</html>