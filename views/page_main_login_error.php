<main class="content-main mbott-30">
    <article class="welcome-container clear">
        <div class="content-left t-center black">
            <div class="formfield-center">
                <p class="orange-text"><?= $message['msg'] ?></p>
                <?php if($message['state'] === 'wrong') :?>
                    <button class="form-button">Zum Login</button>
                <?php endif; ?>
                <?php if($message['state'] === 'clear') :?>
                    <button class="form-button">Zur Liste</button>
                <?php endif; ?>
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