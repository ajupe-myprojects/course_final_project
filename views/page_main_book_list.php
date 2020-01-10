<main class="content-main">
    <section class="list-container clear">
        <div class="content-left t-center black">
            <h2>Bücherliste</h2>
            <div class="sort-bar orange clear">
                <p>Sort by: <a href="#">Name</a></p>
                <button>Neues Buch einfügen</button>
            </div>
            <ul class="book-prev">
            <?php foreach($booklist as $book) :?>
                <li>
                    <img src="/<?= $book->element_thumb ?>" alt="Einbandbild">
                    <div class="clear">
                        <div class="book-title">
                            <h3><?= $book->element_title ?></h3>
                            <h4><?= $book->element_author ?></h4>
                        </div>
                        <p class="book-data">
                            <span class="book-genre"><?= $book->element_genre ?></span>
                            <span class="book-isbn"><?= $book->element_isbn ?></span>
                            <span class="book-userdate">Erstellt : <?= fixDate($book->element_created_at) ?> von : <?= $book->username ?></span>
                        </p>
                    </div>
                    <p class="book-description"><?= substr($book->element_description, 0, 220) . '<span class="remark">...mehr</span>' ?></p>
                    <a href="#"></a>
                </li>
            <?php endforeach; ?>
            </ul>
            <div class="form-container">
                <div class="formfield">
                    <h3 class="t-center orange-text">Neues Buch einfügen:</h3>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="formfield">
                        <label for="booktitle">Buchtitel: <span class="ital-red">*</span></label>
                        <input type="text" name="booktitle" id="booktitle" class="" required>
                    </div>
                    <div class="formfield">
                        <label for="bookauthor">Buchautor: <span class="ital-red">*</span></label>
                        <input type="text" name="bookauthor" id="bookauthor" class="" required>
                    </div>
                    <div class="formfield">
                        <label for="isbn-number">ISBN Nummer (ISBN-13): <span class="ital-red">*</span></label>
                        <input type="text" name="isbn-number" id="isbn-number" class="" required>
                    </div>
                    <div class="formfield">
                        <label for="genre">Bitte wählen sie das Genre aus: <span class="ital-red">*</span></label>
                        <select name="genre" id="genre" required>
                            <option disabled selected value="">---</option>
                            <optgroup>
                                    <option>Science Fiction</option>
                                    <option>Fantasy</option>
                                    <option>Misc</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="formfield">
                        <label for="description">Kurzbeschreibung des Buches: <span class="ital-red">*</span></label>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="formfield">
                        <label for="upload-pic">Bild vom Bucheinband hochladen (optional):</label>
                        <input type="file" name="upload-pic" id="upload-pic">
                    </div>
                    <input type="submit" value="Submit">
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
    </section>
</main>