<?php
function NavBar($x)
{
    echo('
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/Musify-site/home/">Musify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="http://localhost/Musify-site/artist/">Artists</a>
                <a class="nav-link" href="http://localhost/Musify-site/upload/">Submit Song</a>
                ');
                if(empty($x)){
                    echo('
                    <a class="nav-link" href="http://localhost/Musify-site/login/">Login</a>');
                }
                if(!empty($x)){
                    echo('
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item d-flex " href="http://localhost/Musify-site/'.$_SESSION['id'].'/"><div class="everpic"></div>My Profile</a></li>
                        <li><a class="dropdown-item" href="http://localhost/Musify-site/editprofile/">Profile Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="href="http://localhost/Musify-site/logout/">LogOut</a></li>
                    </ul>
                    </li>');
                }
                echo('
            </div>
        </div>
    </div>
    </nav>
');
}
?>