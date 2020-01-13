<footer class="orange">
    <div class="foot-nav">
        <ul>
            <li class="<?php  echo $path_info === '/impressum'  ? 'sub-active' : ''; ?>"><a href="<?= $script ?>/impressum">Impressum</a></li>
            <li class="<?php  echo $path_info === '/contact'  ? 'sub-active' : ''; ?>"><a href="<?= $script ?>/contact">Contact</a></li>
            <li class="<?php  echo $path_info === '/daten'  ? 'sub-active' : ''; ?>"><a href="<?= $script ?>/daten">Datenschutz</a></li>
        </ul>
    </div>
    <div class="stuff">
        Links & Stuff
    </div>
</footer>
</div><!-- end wrapper -->
</body>
</html>