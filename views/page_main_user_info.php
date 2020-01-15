<main class="content-main mbott-30">
    <article class="welcome-container clear">
        <div class="content-left t-center black">
            <div class="t-left">
                <h3> Benutzer: <?= $_SESSION['login']['username'] ?></h3>
                <p>Email : <?= $_SESSION['login']['email'] ?></p>
                <p>Selbstbeschreibung : <?= $_SESSION['login']['user-description'] ?? 'nicht vorhanden' ?></p>
                <p>Registriert am: <?= fixDate($_SESSION['login']['user_created_at']) ?></p>
                <p>Nutzerrechte : <?= $_SESSION['login']['user_role'] === 23 ? 'admin' : 'regular' ?></p>
            </div>
        </div>
        <div class="content-right t-center black white-text">
            <h3 class="mbott-60">Community / News</h3>
            <ul class="newsfeed mbott-30">
                <li>Stuff1</li>
                <li>Stuff2</li>
                <li>Stuff3</li>
                <li>Stuff4</li>
                <li>Stuff5</li>
            </ul>
            <div class="sell-out">
                Werbung
            </div>

        </div>
    </article>
</main>