document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

const fields = document.querySelectorAll('table#field td');
const elements = document.querySelector('#elements');
let activeElement = elements[0].value;
let activeClick;

fields.forEach(field => field.addEventListener('mousedown', function(e){
    if (e.which === 1) {
        editObj.changeElement(field);
    }
    activeClick = 1;
}));

fields.forEach(field => field.addEventListener('mouseup', function(){
    activeClick = 0;
}));

fields.forEach(field => field.addEventListener('mousemove', function(e){
    if (e.which === 1 && activeClick === 1) {
        editObj.changeElement(field);
    }
}));

elements.addEventListener('change', editObj.changeActive);