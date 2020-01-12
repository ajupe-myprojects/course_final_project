<main class="content-main">
    <article class="welcome-container clear">
        <div class="content-left t-center black">
            <div class="form-container">
                <div class="formfield">
                    <h3 class="orange-text t-center">Login</h3>
                </div>
                <form action="./login-user" method="post" id="login">
                    <div class="formfield">
                        <label for="lg-email">Email: <span class="ital-red">*</span></label>
                        <input type="email" name="lg-email" id="lg-email" required>
                    </div>
                    <div class="formfield">
                        <label for="lg-password">Passwort: <span class="ital-red">*</span></label>
                        <input type="password" name="lg-password" id="lg-password" required>
                    </div>
                    <div class="formfield">
                        <input type="submit" value="Login" class="form-button">
                        <button class="form-button">Abbruch</button>
                    </div>
                </form>
                <div class="form-sidebox">
                    <p class="t-left mbott-15">Falls sie ihr Passwort vergessen haben sollten, klicken sie bitte hier! </p>
                    <button class="form-button">Neues Passwort</button>
                    <p class="t-left mtop-15">Ein neues Passwort wird dann generiert und an ihre Emailadresse gesendet.</p>
                </div>
                <div class="formfield-center">
                    <p>Kein Account? Kein Problem!!</p>
                    <button class="form-button">Anmelden</button>
                </div>
            </div>
            <div class="form-container hide">
                <div class="formfield">
                    <h3 class="orange-text t-center">Neuen Account erstellen</h3>
                </div>
                <form action="./signup" method="post" id="signup">
                    <div class="formfield">
                        <label for="sp-email">Email: <span class="ital-red">*</span></label>
                        <input type="email" name="sp-email" id="sp-email" required>
                    </div>
                    <div class="formfield">
                        <label for="sp-username">Benutzername: <span class="ital-red">*</span></label>
                        <input type="text" name="sp-username" id="sp-username" required>
                    </div>
                    <div class="formfield">
                        <input type="submit" value="Sign up" class="form-button">
                        <button class="form-button">Abbruch</button>
                    </div>
                </form>
                <div class="form-sidebox">
                    <p class="t-left">Bitte checken sie, nach dem Klick auf den Sign up Button, ihr Email-Postfach. <br> <br>Ein zufälliges, sicheres Passwort wird generiert und an ihre Emailadresse gesendet. <br> Sie können dieses Passwort nach ihrem ersten Login ändern.</p>
                    
                </div>
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