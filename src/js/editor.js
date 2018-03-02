// object.js

document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

const fields = document.querySelectorAll('table#field td');
const elements = document.querySelector('#elements');
let activeClick;
let activeElement = elements[0].value;
let infotronsCount = document.getElementById("infotrons");
let infotronsAvailableCount = document.getElementById("infotronsAvailable");
let electronsCount = document.getElementById("electrons");

fields.forEach(field => field.addEventListener('mousedown', function(e){
    let element = e.srcElement.dataset.type;

    if (e.which === 1) {
        editObj.changeElement(field);
        activeClick = 1;
    }

    switch(element) {
        case "infotron":
            infotronsAvailableCount.innerHTML = editObj.countElements(element);
            infotronsCount.innerHTML = editObj.countElements(element);
            break;
        case "electron":
            electronsCount.innerHTML = editObj.countElements(element);
            break;
    }
}));

// after button release the click is no longer active, so reflect that
fields.forEach(field => field.addEventListener('mouseup', function(){
    activeClick = 0;
}));

fields.forEach(field => field.addEventListener('mousemove', function(e){
    if (e.which === 1 && activeClick === 1) {
        let element = e.srcElement.dataset.type;

        editObj.changeElement(field);

        switch(element) {
            case "infotron":
                infotronsAvailableCount.innerHTML = editObj.countElements(element);
                infotronsCount.innerHTML = editObj.countElements(element);
                break;
            case "electron":
                electronsCount.innerHTML = editObj.countElements(element);
                break;
        }
    }
}));

// toggle what elements the user will be using
elements.addEventListener('change', editObj.changeActive);