<main class="content-main mbott-30">
    <div class="welcome-container clear">
        <div class="content-left t-center black">
            <article class="book-large">
                <section class="book-large-data clear">
                    <img src="/<?= $book->element_pic === 'no image' ? 'img/uploads/large/dummy_pic_l.jpg' : $book->element_pic ?>" alt="Einband groß">
                    <h3><?= e($book->element_title) ?></h3>
                    <h4>von : <?= e($book->element_author) ?></h4>
                    <p>Beschreibung : <br><?= e($book->element_description) ?></p>
                    <p>
                        <span class=""><?= $book->element_genre ?></span>
                        <span class="">ISBN-13 : <?= $book->element_isbn ?></span>
                        <span class="book-userdate">Erstellt : <?= fixDate($book->element_created_at) ?> von : <?= $book->username ?></span>
                    </p>
                    <?php if(!empty($_SESSION['login'])) :?>
                        <button class="hide-butt">Review schreiben</button>
                    <?php endif; ?>
                </section>
                <?php if(!empty($_SESSION['login'])) :?>
                    <div class="form-container mtop-15 hide" id="rev-book-form">
                        <div class="formfield-center">
                            <h4 class="orange-text">Review hinzufügen</h4>
                        </div>
                        <form action="./add-review" method="post" id="rev-add">
                            <div class="formfield">
                                <label for="review-title">Review-Titel: <span class="ital-red">*</span></label>
                                <input type="text" name="review-title" id="review-title" class="" required>
                            </div>
                            <div class="formfield">
                                <label for="review-text">Review Text: <span class="ital-red">*</span></label>
                                <textarea name="review-text" cols="30" rows="10" id="review-text" required></textarea>
                            </div>
                            <input type="hidden" name="book-id" value="<?= $book->id ?>">
                            <div class="formfield-buttons">
                                <input type="submit" value="Absenden" class="form-button">
                                <button class="form-button">Review abbrechen</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
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
                            <?php if(!empty($_SESSION['login'])) :?>
                                <button class="hide-butt mbott-15" data-rev-id="<?= $rev->rid ?>" data-el-id="<?= $book->id ?>">Kommentar schreiben</button>
                            <?php endif; ?>
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