<!DOCTYPE html>
<html>

<head>
    <title>Musify</title>
    <link rel="icon" href="../ASSETS/logo.png">
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

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Musify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="artist.php">Artists</a>
                    <a class="nav-link" href="submit.php">Submit</a>
                    <a class="nav-link active" aria-current="page" href="Login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="pagename">
        <H1 class="welcome"> <br><br>Login</H1>
    </div>
    <div class="mt-4 mb-4 container d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Login</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Create Account</buttona>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <form class="container row m-3" method="POST" action="../PHP/login.php">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../index.php">Musify</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>                
                    <h1 class="h3 mb-3 fw-normal">Please login</h1>
                    <label for="inputEmail" class="visually-hidden">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" required
                        autofocus>
                    <label for="inputPassword" class="visually-hidden">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <div class="col-4">
                        <button class="w-100 btn btn-dark" type="submit">Log in</button>
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; Musify 2021</p>
                </form>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <form class="container row m-3" action="../PHP/createacc.php" method="POST">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../index.html">Musify</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Create Account</li>
                        </ol>
                    </nav>
                    <error class="text-danger" id="ghalta"> 
                    </error>
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputName" name="Fname" placeholder="John" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPrename" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputPreName" placeholder="Smith" name="Lname" required>
                    </div>
                    <div class="col-12">
                        <label for="user" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user" placeholder="john_smith" name="Uname" required>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="john123@xyz.com" required>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}" title="at least 1 number , 1 uppercase , 1 lowercase . Length[8.15]  " required>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword5" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputPassword5" required>
                    </div>
                    <div class="col-md-6">
                        <label for="artist" class="form-label">Artist Name</label>
                        <input type="text" class="form-control" id="artist" name="artist"
                            placeholder="Jony">
                    </div>
                    <div class="col-md-6">
                        <label for="artisttype" class="form-label">Are You a ?</label>
                        <select id="artisttype" class="form-select" name="role" required>
                            <option selected>Choose...</option>
                            <option>Music Producer</option>
                            <option>Singer</option>
                            <option>Songwriter</option>
                            <option>Instrument Player</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="inputPhone" placeholder="23456789">
                    </div>
                    <div class="col-md-3">
                        <label for="inputSex" class="form-label">Sex</label>
                        <select id="inputSex" name="sex" class="form-select" required>
                            <option selected>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="inputDate" class="form-label">Birth Date</label>
                        <input type="date" name="birth" class="form-control" id="inputDate" max="2021-01-01" required>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                I agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="submit btn btn-dark">Create Account</button>
                    <p class="mt-5 mb-3 text-muted">&copy; Musify 2021</p>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
      <!-- Github -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Section: Social media -->




  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright:
    <a class="text-white" href="#">Musify</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>
        <script src="../JS/script.js"></script>
</body>

</html>