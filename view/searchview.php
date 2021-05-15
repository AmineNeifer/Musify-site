<?php
function search(){
    echo('    <nav class="navbar navbar-light">
    <div class="col mx-4">
        <form class="d-flex" action="http://localhost/Musify-site/search/" method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>
');
}
?>