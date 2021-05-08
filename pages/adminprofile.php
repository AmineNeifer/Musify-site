<?php
session_start();
include_once("../PHP/connect.php");
$bdd = connect();
if(empty($_SESSION['id'])){
    echo "<script>window.location.href='Login.php';</script>";
    exit;
}
if($_SESSION['admin']==0){
    echo "<script>window.location.href='../PHP/forbidden.php';</script>";
    exit;
} 
$l="SELECT * FROM gigs WHERE post LIKE (SELECT MAX(post) FROM gigs)";
$answerl=$bdd->query($l);
$last=$answerl->fetchObject();
$x=$bdd->quote($last->username);
$prox="SELECT * FROM users WHERE Username LIKE $x";
$answerprox=$bdd->query($prox);
$profile=$answerprox->fetchObject();
$gig = "SELECT * FROM gigs";
$answergig=$bdd->query($gig);
$usrs = "SELECT * FROM users";
$answeruser=$bdd->query($usrs);
$music = "SELECT * FROM music";
$answermusic=$bdd->query($music);
$artists = "SELECT * FROM artists";
$answerartists=$bdd->query($artists);
if($answermusic->rowCount()==0){
    $per=-1;
}else{
    $per= ($answerartists->rowCount()/$answermusic->rowCount())*100;
}
$precent = number_format((float)$per, 1, '.', '');
$prec = $precent. '%';
$pro="SELECT * FROM artists WHERE role like'Music Producer'";
$prod=$bdd->query($pro);
$producer=$prod -> rowCount();
$sin="SELECT * FROM artists WHERE role like'Singer'";
$sing=$bdd->query($sin);
$singer=$sing -> rowCount();
$wr="SELECT * FROM artists WHERE role like'Song Writer'";
$write=$bdd->query($wr);
$writer=$write -> rowCount();
$pl="SELECT * FROM artists WHERE role like'Instrument Player'";
$play=$bdd->query($pl);
$player=$play -> rowCount();
$tt="SELECT * FROM artists";
$tot=$bdd->query($tt);
$total=$tot -> rowCount();
$ml="SELECT * FROM users WHERE sex LIKE 'Male'";
$mal=$bdd->query($ml);
$male=$mal -> rowCount();
$fml="SELECT * FROM users WHERE sex LIKE 'Female'";
$fmal=$bdd->query($fml);
$female=$fmal -> rowCount();
$otr="SELECT * FROM users WHERE sex LIKE 'Others'";
$othr=$bdd->query($otr);
$others=$othr -> rowCount();

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
                    <li class="breadcrumb-item active" aria-current="page">AdminPage</li>
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

                <!-- Content Row -->
                <div class="row">

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Users Genders</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Male
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-danger"></i> Female
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> Others
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4 col-xl-8 col-lg-7">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Artist Types</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Music Producers <span class="float-right"><?= ($producer/$total)*100 ?>%</span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:<?= ($producer/$total)*100 ?>%;"
                                    aria-valuenow="<?= ($producer/$total)*100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Singers <span class="float-right"><?= ($singer/$total)*100 ?>%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= ($singer/$total)*100 ?>%"
                                    aria-valuenow="<?= ($singer/$total)*100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Song Writers <span class="float-right"><?= ($writer/$total)*100 ?>%</span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: <?= ($writer/$total)*100 ?>%" aria-valuenow="<?= ($writer/$total)*100 ?>"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Instrument Players <span class="float-right"><?= ($player/$total)*100 ?>%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= ($player/$total)*100 ?>%"
                                    aria-valuenow="<?= ($player/$total)*100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">

                        <!-- Color System -->
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                        Success
                                        <div class="text-white-50 small">#1cc88a</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-info text-white shadow">
                                    <div class="card-body">
                                        Info
                                        <div class="text-white-50 small">#36b9cc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-warning text-white shadow">
                                    <div class="card-body">
                                        Warning
                                        <div class="text-white-50 small">#f6c23e</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-danger text-white shadow">
                                    <div class="card-body">
                                        Danger
                                        <div class="text-white-50 small">#e74a3b</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-secondary text-white shadow">
                                    <div class="card-body">
                                        Secondary
                                        <div class="text-white-50 small">#858796</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-light text-black shadow">
                                    <div class="card-body">
                                        Light
                                        <div class="text-black-50 small">#f8f9fc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-dark text-white shadow">
                                    <div class="card-body">
                                        Dark
                                        <div class="text-white-50 small">#5a5c69</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Latest Gig</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="profilepic"></div>
                                    <h5><?=$profile->Username;?></h5>
                                </div>
                                <h5><?=$last->title?></h5>
                                <p><?=$last->description?></p>
                                <small><?php echo($last->post);?></small>
                                <br>
                                <a href="artistprofile.php?ref=<?=$profile->Username;?>">Check <?=$profile->artname;?> profile</a>
                            </div>
                        </div>

                        <!-- Approach -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                            </div>
                            <div class="card-body">
                                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                    CSS bloat and poor page performance. Custom CSS classes are used to create
                                    custom components and custom utility classes.</p>
                                <p class="mb-0">Before working with this theme, you should become familiar with the
                                    Bootstrap framework, especially the utility classes.</p>
                            </div>
                        </div>

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
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart").getContext('2d');;
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Male", "Female", "Others"],
                    datasets: [{
                        data: [<?= $male ?>, <?= $female ?>, <?= $others ?>],
                        backgroundColor: ['#4e73df', '#e74a3b', '#f6c23e'],
                        hoverBackgroundColor: ['#2e59d9', '#A1342A', '#D6A936'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });

        </script>




</body>

</html>