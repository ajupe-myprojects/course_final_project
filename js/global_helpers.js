(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        
        var main = document.getElementsByTagName('main')[0];

        var burger = document.getElementsByClassName('burger-menu')[0];

        //functions
        //++++++++++++++++ AJAX stuff(admin) +++++++++++++++++++++(not yet implemented)//
        function buildUserList(obj)
        {
            var list = document.getElementById('userlist');
            var table = document.createElement('TABLE');
            for (var i = 0; i < obj.length; i++){
                var tr = document.createElement('TR');
                var td1 = document.createElement('TD')
                td1.innerText = obj[i].username;
                tr.append(td1);
                var td2 = document.createElement('TD')
                td2.innerText = obj[i].email;
                tr.append(td2);
                var td3 = document.createElement('TD')
                td3.innerText = obj[i].user_created_at;
                tr.append(td3);
                table.append(tr);
            }
            list.append(table);
        }

        function getList(strg)
        {
            var xhtm = new XMLHttpRequest();
            xhtm.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    console.log(response);
                    if (strg === 'user-list') {
                        
                        buildUserList(JSON.parse(response));
                    }
                    if (strg === 'elements-list') {
                        
                        document.getElementById('elementlist').innerText = 'Bücher eingetragen : ' + JSON.parse(response).length;
                    }
                }
            }
            xhtm.open("GET", "../init.php?"+ strg + "=1", true);
            xhtm.send(); 
        }

        if(window.innerWidth < 921){
            document.getElementsByClassName('nav-bar')[0].classList.add('hide');
        }
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//

        // crazy stuff !!! don't try this at home kids!!! (Kommentarform)

        function createComForm(id, e_id, object)
        {
            var com_form = document.createElement('FORM');
            com_form.setAttribute("action", "./add-comment");
            com_form.setAttribute("method", "POST");
            com_form.setAttribute("id", "com-form");
            var form_field = document.createElement('DIV');
            form_field.classList.add('formfield');
            var lab1 = document.createElement('LABEL');
            lab1.setAttribute('for', 'comm-title');
            lab1.innerHTML = 'Kommentar-Titel: <span class="ital-red">*</span>';
            form_field.append(lab1);
            var inp1 = document.createElement('INPUT');
            inp1.setAttribute('type', 'text');
            inp1.setAttribute('name', 'comm-title');
            inp1.setAttribute('id', 'comm-title');
            inp1.setAttribute('required', '');
            form_field.append(inp1);
            var lab2 = document.createElement('LABEL');
            lab2.setAttribute('for', 'comm-text');
            lab2.innerHTML = 'Kommentar-Text: <span class="ital-red">*</span>';
            form_field.append(lab2);
            var inp2 = document.createElement('TEXTAREA');
            inp2.setAttribute('name', 'comm-text');
            inp2.setAttribute('id', 'comm-text');
            inp2.setAttribute('cols', '30');
            inp2.setAttribute('rows', '10');
            inp2.setAttribute('required', '');
            form_field.append(inp2);
            var hidd = document.createElement('INPUT');
            hidd.setAttribute('type', 'hidden');
            hidd.setAttribute('name', 'rev-id');
            hidd.setAttribute('value', id);
            form_field.append(hidd);
            var hidd2 = document.createElement('INPUT');
            hidd2.setAttribute('type', 'hidden');
            hidd2.setAttribute('name', 'el-id');
            hidd2.setAttribute('value', e_id);
            form_field.append(hidd2);
            var sub = document.createElement('INPUT');
            sub.classList.add('form-button');
            sub.classList.add('mr-10');
            sub.setAttribute('type', 'submit');
            sub.setAttribute('value', 'Absenden');
            form_field.append(sub);
            var butt = document.createElement('BUTTON');
            butt.classList.add('form-button');
            butt.innerText = 'Kommentar abbrechen';
            form_field.append(butt);
            com_form.append(form_field);
            object.parentNode.insertBefore(com_form, object.nextSibling);
            com_form.addEventListener('submit', function(e){
                var com_title = inp1;
                var com_text = inp2;
                var notic = com_form.getElementsByClassName('ital-red');
                var title = com_title.value.trim();
                var text = com_text.value.trim();
                var text_test = /^[_A-z0-9,.!?:\n\s()ÜÖÄüöäß-]*$/;
                if(title !== '' && title.match(text_test)){
                    com_title.classList.remove('error')
                    notic[0].innerText = '';
                }else{
                    com_title.classList.add('error');
                    notic[0].innerText = 'Bitte einen Titel eintragen';
                }
                if(text !== '' && text.match(text_test)){
                    com_text.classList.remove('error')
                    notic[1].innerText = '';
                }else{
                    com_text.classList.add('error');
                    notic[1].innerText = 'Bitte Text eintragen';
                }


                if(com_form.getElementsByClassName('error').length !== 0){
                    e.preventDefault();
                }
            });
        }

        ////event listeners

        main.addEventListener('click', function(e){
            
            if(e.target.nodeName === 'BUTTON'){

                switch(e.target.innerText){
                    case 'Anmelden':
                        document.getElementsByClassName('form-container')[1].classList.remove('hide');
                        document.getElementsByClassName('form-container')[0].classList.add('hide');
                        document.getElementsByClassName('formfield-center')[0].classList.add('hide');
                        break;
                    case 'Neues Passwort':
                        document.getElementsByClassName('form-container')[2].classList.remove('hide');
                        document.getElementsByClassName('form-container')[0].classList.add('hide');
                        document.getElementsByClassName('formfield-center')[0].classList.add('hide');
                        break;
                    case 'Abbruch':
                        e.preventDefault();
                        var target = e.target.getAttribute('data-target');
                        location.replace("." + target);
                        break;
                    case 'Schließen':
                        e.preventDefault();
                        location.replace("./start");
                        break;
                    case 'Zum Login' :
                        location.replace("./login");
                        break;
                    case 'Zur Liste' :
                        location.replace("./start");
                        break;
                    case 'Passwort ändern':
                        document.getElementById('change-pass').classList.remove('hide');
                        e.target.classList.add('hide');
                        break;
                    case 'Kontakt-Form' :
                        location.replace("./contact");
                        break;
                    case 'Neues Buch einfügen' :
                        document.getElementById('new-book-form').classList.remove('hide');
                        break;
                    case 'Review schreiben' :
                        document.getElementById('rev-book-form').classList.remove('hide');
                        break;
                    case 'Review abbrechen' :
                        e.preventDefault();
                        location.reload();
                        break;
                    case 'Kommentar schreiben':
                        var id = e.target.getAttribute('data-rev-id');
                        var e_id = e.target.getAttribute('data-el-id');
                        if(!document.getElementById('com-form')){
                            createComForm(id, e_id, e.target);
                        }
                        break;
                    case 'Kommentar abbrechen' :
                        e.preventDefault();
                        location.reload();
                        break;
                    case 'Delete':
                        var id = e.target.getAttribute('data-element-id');
                        if(confirm('Sind sie 250% sicher?')){

                            location.replace("./delete-element?id=" + id);
                        }else{
                            location.reload();
                        }
                        break;
                    case 'Delete Review':
                        var id = e.target.getAttribute('data-review-id');
                        var elid = e.target.getAttribute('data-element-id');
                        if(confirm('Sind sie 250% sicher?')){

                            location.replace("./delete-review?id=" + id + '&elid=' + elid);
                        }else{
                            location.reload();
                        }
                        break;
                    case 'Delete Comment':
                        var id = e.target.getAttribute('data-comment-id');
                        var elid = e.target.getAttribute('data-element-id');
                        if(confirm('Sind sie 250% sicher?')){

                            location.replace("./delete-comment?id=" + id + '&elid=' + elid);
                        }else{
                            location.reload();
                        }
                        break;
                }
            }
        });

        window.addEventListener('resize', function(){
            if(window.innerWidth < 921){
                document.getElementsByClassName('nav-bar')[0].classList.add('hide');
            }else{
                document.getElementsByClassName('nav-bar')[0].classList.remove('hide');
            }
        });

        burger.addEventListener('click', function(e){
            if(document.getElementsByClassName('nav-bar')[0].classList.contains('hide')){
                document.getElementsByClassName('nav-bar')[0].classList.remove('hide');
            }else{
                document.getElementsByClassName('nav-bar')[0].classList.add('hide');
            }
            
        });

    });
}(window, document));