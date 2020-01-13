(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        //forms
        var ct_form = document.getElementById('contact');

        //inputs login
        var ct_email = document.getElementById('ct-email');
        var ct_name = document.getElementById('ct-name');
        var ct_sname = document.getElementById('ct-sname');
        var ct_msg = document.getElementById('ct-message');

        //notices (span)
        var notices = document.getElementsByClassName('ital-red');

        //// event listeners
        if(!!ct_form){
            ct_form.addEventListener('submit', function(e){

                var mail = ct_email.value.trim();
                var name = ct_name.value.trim();
                var sname = ct_sname.value.trim();
                var message = ct_msg.value.trim();
                var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var char_test = /^[_A-z0-9]*((-)*[_A-z0-9])*$/;
                var text_test = /^[_A-z0-9]*\,|\.|\;|\-|\:*$/;

                if(mail !== '' && mail.match(pattern)){
                    ct_email.classList.remove('error')
                    notices[2].innerText = '';
                }else{
                    ct_email.classList.add('error');
                    notices[2].innerText = 'Bitte eine valide Email eintragen!';
                }
                if(name !== '' && name.match(char_test)){
                    ct_name.classList.remove('error')
                    notices[0].innerText = '';
                }else{
                    ct_name.classList.add('error');
                    notices[0].innerText = 'Bitte ihren Vornamen eintragen.';
                }
                if(sname !== '' && sname.match(char_test)){
                    ct_sname.classList.remove('error')
                    notices[1].innerText = '';
                }else{
                    ct_sname.classList.add('error');
                    notices[1].innerText = 'Bitte ihren Nachnamen eintragen.';
                }
                if(message !== '' && message.match(text_test)){
                    ct_msg.classList.remove('error')
                    notices[3].innerText = '';
                }else{
                    ct_msg.classList.add('error');
                    notices[3].innerText = 'Bitte eine Nachricht eintragen. (Keine Sonderzeichen)';
                }
                if(document.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }
            });
        }

    });
}(window, document));