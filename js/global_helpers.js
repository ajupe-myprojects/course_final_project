(function(window,document){
    window.addEventListener('load', function(){

        ////definitions / objects / functions
        
        var main = document.getElementsByTagName('main')[0];

        ////event listeners

        main.addEventListener('click', function(e){
            
            if(e.target.nodeName === 'BUTTON'){

                switch(e.target.innerText){
                    case 'Anmelden':
                        document.getElementsByClassName('form-container')[1].classList.remove('hide');
                        document.getElementsByClassName('form-container')[0].classList.add('hide');
                        document.getElementsByClassName('formfield-center')[0].classList.add('hide');
                        break;
                    case 'Abbruch':
                        e.preventDefault();
                        location.replace("./");
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
                    case 'Neues Buch einfügen' :
                        document.getElementById('new-book-form').classList.remove('hide');
                        break;
                }
            }
        });
    });
}(window, document));