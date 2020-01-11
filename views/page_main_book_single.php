<main class="content-main mbott-30">
    <div class="welcome-container clear">
        <div class="content-left t-center black">
            <article class="book-large">
                <section class="book-large-data clear">
                    <img src="/<?= $book->element_pic ?>" alt="Einband groß">
                    <h3><?= e($book->element_title) ?></h3>
                    <h4>von : <?= e($book->element_author) ?></h4>
                    <p>Beschreibung : <br><?= e($book->element_description) ?></p>
                    <p>
                        <span class=""><?= $book->element_genre ?></span>
                        <span class="">ISBN-13 : <?= $book->element_isbn ?></span>
                        <span class="book-userdate">Erstellt : <?= fixDate($book->element_created_at) ?> von : <?= $book->username ?></span>
                    </p>
                </section>
                <section class="book-reviews">
                    <h3>Reviews: </h3>
                    <?php foreach($book_rev as $rev) : ?>
                        <div class="rev-single">
                            <h4><?= e($rev->rev_title) ?></h4>
                            <div class="rev-data">
                                <span class="book-userdate"> Erstellt : <?= fixDate($rev->rev_created_at) ?> </span>
                                <span class="book-userdate"> von : <?= e($rev->username) ?></span>
                             </div>
                            <p class="clearfix"><?= e($rev->rev_text) ?></p>
                            <div class="rev-comments">
                                <header>Review-Kommentare:</header>
                                <?php foreach($rev_comments as $comment) : ?>
                                    <?php if($comment->comment_rev_rid === $rev->rid) : ?>
                                        <div class="comm-single">
                                            <h5><?= e($comment->comment_title) ?></h5>
                                            <div class="comm-data">
                                                <span class="book-userdate">Erstellt :<?= fixDate($comment->comment_created_at) ?></span>
                                                <span class="book-userdate"> von : <?= e($comment->username) ?></span>
                                            </div>
                                            <p class="clearfix"><?= e($comment->comment_text) ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </article>

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
    </div>
</main>