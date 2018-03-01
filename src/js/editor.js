document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

const fields = document.querySelectorAll('table#field td');
const elements = document.querySelector('#elements');
let activeClick;
    activeElement = elements[0].value;
    infotrons_count = document.getElementById("infotrons");
    infotrons_available_count = document.getElementById("infotronsAvailable");
    electrols_count = document.getElementById("electrons");

fields.forEach(field => field.addEventListener('mousedown', function(e){
    let element = e.originalTarget.dataset.type;
    switch(element) {
        case "infotron":
            infotrons_available_count.innerHTML = editObj.countElements(element);
            infotrons_count.innerHTML = editObj.countElements(element);
            break;
        case "electron":
            electrols_count.innerHTML = editObj.countElements(element);
            break;
        default:
            console.log(element);
    }
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
        let element = e.originalTarget.dataset.type;
        switch(element) {
            case "infotron":
                infotrons_available_count.innerHTML = editObj.countElements(element);
                infotrons_count.innerHTML = editObj.countElements(element);
                break;
            case "electron":
                electrols_count.innerHTML = editObj.countElements(element);
                break;
            default:
                console.log(element);
        }
        editObj.changeElement(field);
    }
}));

elements.addEventListener('change', editObj.changeActive);