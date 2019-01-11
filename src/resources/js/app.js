import 'jquery';
import 'popper.js';
import 'bootstrap';

$(document).ready(function(){
    $('.dropdown-menu').click(function(event){
        event.stopPropagation();
    });
});
