import 'jquery';
import 'popper.js';
import 'bootstrap';
import Axios from 'axios';

Axios.get('http://localhost:3001/api/v1/levels/14')
     .then(function(response){
         console.log(response.data.data);
     });

$(document).ready(function(){
    $('.dropdown-menu').click(function(event){
        event.stopPropagation();
    });
});


