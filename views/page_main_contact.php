<main class="content-main mbott-30">
    <article class="welcome-container clear">
        <div class="content-left t-center black">
            <div class="form-container">
                <div class="formfield">
                    <h3 class="orange-text t-center">Kontakt</h3>
                </div>
                <form action="./make-contact" method="post" id="contact">
                    <div class="formfield">
                        <label for="ct-name">Vorname : <span class="ital-red">*</span></label>
                        <input type="text" name="ct-name" id="ct-name" required>
                    </div>
                    <div class="formfield">
                        <label for="ct-sname">Nachname : <span class="ital-red">*</span></label>
                        <input type="text" name="ct-sname" id="ct-sname" required>
                    </div>
                    <div class="formfield">
                        <label for="ct-email">Email : <span class="ital-red">*</span></label>
                        <input type="email" name="ct-email" id="ct-email" required>
                    </div>
                    <div class="form-sidebox">
                        <h4 class="orange-text">Hinweis: </h4>
                        <p class="t-left mtop-15">Bitte beschreiben sie ihr Anliegen in einfachen Worten. <br>Falls eine Rückmeldung erwünscht ist, weisen Sie bitte in ihrer Nachricht darauf hin.</p>
                    </div>
                    <div class="formfield">
                        <label for="ct-tel">Telefonnummer (optional) :</label>
                        <input type="text" name="ct-tel" id="ct-tel">
                    </div>
                    <div class="formfield">
                        <label for="ct-message">Nachricht : <span class="ital-red">*</span></label>
                        <textarea name="ct-message" id="ct-message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="formfield">
                        <input type="submit" value="Abschicken" class="form-button">
                        <button class="form-button">Abbruch</button>
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
                <li>Stuff5</li>
            </ul>
            <div class="sell-out">
                Werbung
            </div>

        </div>
    </article>
</main>