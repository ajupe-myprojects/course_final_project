<nav class="top-nav j-green">
    <div class="nav-container clear">
        <h1 class="home orange-text ">SciFi- und Fantasy Bücherforum</h1>
        <button class="burger-menu"></button>
        <ul class="nav-bar">
            <li class="<?php  echo $path_info === ''  ? 'active' : ''; ?>"><a href="<?=$script?>">Home</a></li>
            <li class="<?php  echo $path_info === '/start'  ? 'active' : ''; ?>"><a href="<?= $script ?>/start">Bücherliste</a></li>
            <?php if(!isset($_SESSION['login'])) :?>
            <li class="<?php  echo $path_info === '/login'  ? 'active' : ''; ?>"><a href="<?= $script ?>/login">Login</a></li>
            <?php endif; ?>
            <?php if(!empty($_SESSION['login'])) :?>
            <li class="<?php  echo $path_info === '/user-info'  ? 'active' : ''; ?>"><a href="<?= $script ?>/user-info">Benutzer</a></li>
            <?php endif; ?>
            <?php if(!empty($_SESSION['login'])) :?>
            <li class=""><a href="<?= $script ?>/logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>