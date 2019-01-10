/**
 * @include 'objects'
**/

// prevent users from right-clicking
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

const fields = document.querySelectorAll('table#field td');
const elements = document.querySelector('#elements');

// determine whether the user is still holding the mouse button
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

    editObj.updateCounts(element);
}));


// after button release the click is no longer active, so reflect that
fields.forEach(field => field.addEventListener('mouseup', function(){
    activeClick = 0;
}));

fields.forEach(field => field.addEventListener('mousemove', function(e){
    if (e.which === 1 && activeClick === 1) {
        let element = e.srcElement.dataset.type;

        editObj.changeElement(field);

        editObj.updateCounts(element);
    }
}));

// toggle what elements the user will be using
elements.addEventListener('change', editObj.changeActive);

let levelButton = document.querySelector('.mainMenu .level');
levelButton.addEventListener('click', mainMenu.toggleLevelButton);

let levelDetails = document.querySelector('.level-details');
levelDetails.style.display = 'none';

let gravitySwitch = document.querySelector('.level-details .gravity');
gravitySwitch.addEventListener('click', mainMenu.toggleGravity);

let freezeZonksSwitch = document.querySelector('.level-details .freezeZonks');
freezeZonksSwitch.addEventListener('click', mainMenu.toggleFreezeZonks);