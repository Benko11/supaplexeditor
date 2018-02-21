let editObj = {
    changeElement: function(field) {
        field.style.background = `url(/icons/${activeElement}.png)`;
    },

    movementDetection: function() {
        console.log(this.dataset.position)
    },

    changeActive: function() {
        activeElement = this.value;
    }
};


const fields = document.querySelectorAll('table#field td');
const elements = document.querySelector('#elements');
let activeElement = elements[0].value;

//	fields.forEach(field => field.addEventListener('mouseenter', editObj.movementDetection));
fields.forEach(field => field.addEventListener('mousedown', function(){
    editObj.changeElement(field);


    // TODO: implement mouse dragging
    field.addEventListener('mousemove', function(){
        editObj.changeElement(this);
    });
}));

elements.addEventListener('change', editObj.changeActive);