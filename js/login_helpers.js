(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        //forms
        var lg_form = document.getElementById('login');

        //inputs login
        var lg_email = document.getElementById('lg-email');
        var lg_pass = document.getElementById('lg-password');

        //notices (span)
        var notices = document.getElementsByClassName('ital-red');

        //// event listeners
        if(!!lg_form){
            lg_form.addEventListener('submit', function(e){

                var err = document.getElementsByClassName('error');
                var mail = lg_email.value.trim();
                var pass = lg_pass.value.trim();
                var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var char_test = /^[_A-z0-9]*((-|\s)*[_A-z0-9])*$/;

                if(mail !== '' && mail.match(pattern)){
                    lg_email.classList.remove('error')
                    notices[0].innerText = '';
                }else{
                    lg_email.classList.add('error');
                    notices[0].innerText = 'Bitte eine valide Email eintragen!';
                }

                if(pass !== '' && pass.match(char_test)){
                    lg_pass.classList.remove('error');
                    notices[1].innerText = '';
                }else{
                    lg_pass.classList.add('error');
                    notices[1].innerText = 'Keine Sonderzeichen!!!';
                }

                if(err.length !== 0){
                    e.preventDefault();
                }
            });
        }

    });
}(window, document));