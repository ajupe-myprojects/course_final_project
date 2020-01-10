<nav class="top-nav j-green">
    <div class="nav-container clear">
        <h1 class="home orange-text ">Book Emporium</h1>
        <ul class="nav-bar">
            <li class="<?php  echo $path_info === ''  ? 'active' : ''; ?>"><a href="<?= $script ?>">Home</a></li>
            <li class="<?php  echo $path_info === '/start'  ? 'active' : ''; ?>"><a href="<?= $script ?>/start">Bücherliste</a></li>
            <li class="<?php  echo $path_info === '/login'  ? 'active' : ''; ?>"><a href="<?= $script ?>/login">Login</a></li>
        </ul>
    </div>
</nav>