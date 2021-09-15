require('./bootstrap');

const del = document.querySelectorAll('.del-post');

del.forEach(item => {
    item.addEventListener('submit', function(event) {
        const message = confirm('Stai per eliminare il post! Vuoi procedere?');

        if(!message){
            event.preventDefault();
        }
    })
});