document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

const fields = document.querySelectorAll('table#field td');
const elements = document.querySelector('#elements');
let activeElement = elements[0].value;

fields.forEach(field => field.addEventListener('mousedown', function(e){
    if (e.which === 1) {
        editObj.changeElement(field);
    }

    // TODO: implement mouse dragging
}));

elements.addEventListener('change', editObj.changeActive);