(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        //forms
        var rev = document.getElementById('rev-add');

        
        //inputs
        var rv_title = document.getElementById('review-title');
        var rv_text = document.getElementById('review-text');

        
        //notices
        var notices = document.getElementsByClassName('ital-red');
        var notic = comm_form.getElementsByClassName('ital-red');

        //// event listeners
        if(!!rev){
            rev.addEventListener('submit', function(e){

                var title = rv_title.value.trim();
                var text = rv_text.value.trim();
                var text_test = /^[_A-z0-9,.!?\n\s]*$/;

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



    });
}(window, document));