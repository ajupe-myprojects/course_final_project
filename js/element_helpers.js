(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        //forms
        var rev = document.getElementById('rev-add');
        var book = document.getElementById('new-book-form');
        
        //inputs
        var rv_title = document.getElementById('review-title');
        var rv_text = document.getElementById('review-text');

        var el_title = document.getElementById('booktitle');
        var el_author = document.getElementById('bookauthor');
        var el_isbn = document.getElementById('isbn-number');
        var el_genre = document.getElementById('genre');
        var el_description = document.getElementById('description');

        
        //notices
        var notices = document.getElementsByClassName('ital-red');
        

        //// event listeners
        if(!!rev){
            rev.addEventListener('submit', function(e){

                var title = rv_title.value.trim();
                var text = rv_text.value.trim();
                var text_test = /^[_A-z0-9,.!?\n\s()ÜÖÄüöäß-]*$/;

                if(title !== '' && title.match(text_test)){
                    rv_title.classList.remove('error')
                    notices[0].innerText = '';
                }else{
                    rv_title.classList.add('error');
                    notices[0].innerText = 'Bitte einen Titel eintragen';
                }
                if(text !== '' && text.match(text_test)){
                    rv_text.classList.remove('error')
                    notices[1].innerText = '';
                }else{
                    rv_text.classList.add('error');
                    notices[1].innerText = 'Bitte Text eintragen';
                }

                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }
            });
        }

        if(!!book){
            book.addEventListener('submit', function(e){

                var title = el_title.value.trim();
                var author = el_author.value.trim();
                var isbn = el_isbn.value.trim();
                var genre = el_genre.value;
                var description = el_description.value.trim();
                var text_test = /^[_A-z0-9,.!?\n\s()ÜÖÄüöäß-]*$/;
                var num_test = /^[0-9]{3}(-)[0-9]*$/;

                if(title !== '' && title.match(text_test)){
                    el_title.classList.remove('error')
                    notices[0].innerText = '';
                }else{
                    el_title.classList.add('error')
                    notices[0].innerText = 'Bitte einen Titel angeben!';
                }
                if(author !== '' && author.match(text_test)){
                    el_author.classList.remove('error')
                    notices[1].innerText = '';
                }else{
                    el_author.classList.add('error')
                    notices[1].innerText = 'Bitte den Autor angeben!';
                }
                if(isbn !== '' && isbn.match(num_test)){
                    el_isbn.classList.remove('error')
                    notices[2].innerText = '';
                }else{
                    el_isbn.classList.add('error')
                    notices[2].innerText = 'Bitte die ISBN Nummer angeben!';
                }
                if(genre !== '---' ){
                    el_genre.classList.remove('error')
                    notices[3].innerText = '';
                }else{
                    el_genre.classList.add('error')
                    notices[3].innerText = 'Bitte ein Genre auswählen!';
                }
                if(description !== '' && description.match(text_test)){
                    el_description.classList.remove('error')
                    notices[4].innerText = '';
                }else{
                    el_description.classList.add('error')
                    notices[4].innerText = 'Bitte eine Beschreibung eintragen';
                }


                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }

            });
        }


    });
}(window, document));