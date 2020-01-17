(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        //forms
        var lg_form = document.getElementById('login');
        var sp_form = document.getElementById('signup');
        var np_form = document.getElementById('send-new-pw');
        var cp_form = document.getElementById('change-pass');


        //inputs login
        var lg_email = document.getElementById('lg-email');
        var lg_pass = document.getElementById('lg-password');
        //inputs signup
        var sp_email = document.getElementById('sp-email');
        var sp_username = document.getElementById('sp-username');
        //inputs-sendpw
        var np_email = document.getElementById('rg-email');
        //inputs-changepw
        var cp_oldpw = document.getElementById('old-pw');
        var cp_newpw = document.getElementById('new-pw');
        var cp_verpw = document.getElementById('verify-pw');

        //notices (span)
        var notices = document.getElementsByClassName('ital-red');

        //functions

        function  passwordChange()
        {
            var omail = cp_oldpw.value.trim();
            var nmail = cp_newpw.value.trim();
            var vmail = cp_verpw.value.trim();
            var text_test = /^[_A-z0-9!?:ÜÖÄüöäß-]*$/;
            if(omail !== '' && omail.match(text_test)){
                cp_oldpw.classList.remove('error')
                notices[0].innerText = '';
            }else{
                cp_oldpw.classList.add('error');
                notices[0].innerText = 'Bitte ein valides Passwort eintragen!';
            }
            if(nmail !== '' && nmail.match(text_test)){
                cp_newpw.classList.remove('error')
                notices[1].innerText = '';
            }else{
                cp_newpw.classList.add('error');
                notices[1].innerText = 'Bitte ein valides Passwort eintragen!';
            }
            if(vmail !== '' && vmail.match(text_test)){
                cp_verpw.classList.remove('error')
                notices[2].innerText = '';
            }else{
                cp_verpw.classList.add('error');
                notices[2].innerText = 'Bitte ein valides Passwort eintragen!';
            }
        }

        function newPwVerify()
        {
            var nmail = cp_newpw.value.trim();
            
            var text_test = /^[_A-z0-9!?:ÜÖÄüöäß-]*$/;
            if(nmail !== '' && nmail.match(text_test)){
                if(nmail === document.getElementById('verify-pw').value.trim()){
                    cp_verpw.classList.remove('error')
                    notices[2].innerText = '';
                }else{
                    cp_verpw.classList.add('error');
                    notices[2].innerText = 'Passwörter stimmen nicht überein!';
                }
            }else{
                cp_verpw.classList.add('error');
                notices[2].innerText = 'Bitte tragen sie das erste Passwort ein';
            }
        }

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

        if(!!np_form){
            np_form.addEventListener('submit', function(e){

                var mail = np_email.value.trim();
                var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                if(mail !== '' && mail.match(pattern)){
                    np_email.classList.remove('error')
                    notices[4].innerText = '';
                }else{
                    np_email.classList.add('error');
                    notices[4].innerText = 'Bitte eine valide Email eintragen!';
                }
                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }
            });
        }

        if(!!cp_form){

            cp_form.addEventListener('submit', function(e){

                passwordChange();

                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }

            });
            
            cp_verpw.addEventListener('keyup', function(e){
                
                newPwVerify();

            });

        }
    });
}(window, document));