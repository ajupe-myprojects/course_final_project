(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        //forms
        var lg_form = document.getElementById('login');
        var sp_form = document.getElementById('signup');

        //inputs login
        var lg_email = document.getElementById('lg-email');
        var lg_pass = document.getElementById('lg-password');
        //inputs signup
        var sp_email = document.getElementById('sp-email');
        var sp_username = document.getElementById('sp-username');

        //notices (span)
        var notices = document.getElementsByClassName('ital-red');

        //// event listeners
        if(!!lg_form){
            lg_form.addEventListener('submit', function(e){

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

                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }
            });
        }

        if(!!sp_form){
            sp_form.addEventListener('submit', function(e){

                var mail = sp_email.value.trim();
                var name = sp_username.value.trim();
                var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var char_test = /^[_A-z0-9]*((-|\s)*[_A-z0-9])*$/;

                if(mail !== '' && mail.match(pattern)){
                    sp_email.classList.remove('error')
                    notices[2].innerText = '';
                }else{
                    sp_email.classList.add('error');
                    notices[2].innerText = 'Bitte eine valide Email eintragen!';
                }
                if(name !== '' && name.match(char_test)){
                    sp_username.classList.remove('error');
                    notices[3].innerText = '';
                }else{
                    sp_username.classList.add('error');
                    notices[3].innerText = 'Keine Sonderzeichen!!!';
                }

                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }
            });
            
        }
    });
}(window, document));