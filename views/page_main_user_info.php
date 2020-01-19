<main class="content-main mbott-30">
    <article class="welcome-container clear">
        <div class="content-left t-center black">
            <div class="formfield">
                <h3 class="orange-text"> Benutzer: <?= $_SESSION['login']['username'] ?></h3>
                <p>Email : <?= $_SESSION['login']['email'] ?></p>
                <p>Selbstbeschreibung : <?= $_SESSION['login']['user_description'] ?? 'nicht vorhanden' ?></p>
                <p>Registriert am: <?= fixDate($_SESSION['login']['user_created_at']) ?></p>
                <p>Nutzerrechte : <?= $_SESSION['login']['user_role'] === 23 ? 'admin' : 'limited' ?></p>
            </div>
            <div class="formfield mtop-15">
                <button class="form-button">Passwort ändern</button>
                <form action="./change-pass" method="post" id="change-pass" class="hide">
                    <div class="formfield">
                        <label for="old-pw">Altes Passwort : <span class="ital-red">*</span></label>
                        <input type="text" name="old-pw" id="old-pw" required>
                    </div>
                    <div class="formfield">
                        <label for="new-pw">Neues Passwort : <span class="ital-red">*</span></label>
                        <input type="password" name="new-pw" id="new-pw" required>
                    </div>
                    <div class="formfield">
                        <label for="verify-pw">Neues Passwort (Wiederholung): <span class="ital-red">*</span></label>
                        <input type="password" name="verify-pw" id="verify-pw" required>
                    </div>
                    <div class="formfield">
                        <input type="submit" value="Send Change" class="form-button">
                        <button class="form-button" data-target="/user-info">Abbruch</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="content-right t-center black white-text">
            <h3 class="mbott-60">Community / News</h3>
            <ul class="newsfeed mbott-30">
                <li>Stuff1</li>
                <li>Stuff2</li>
                <li>Stuff3</li>
                <li>Stuff4</li>
            </ul>
            <div class="sell-out">
                Werbung
            </div>

        </div>
    </article>
</main>