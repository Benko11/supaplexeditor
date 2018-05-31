const changes = document.forms['changes'];
let editObj = {
    changeElement: function(field) {
        field.style.background = `url(icons/${activeElement}.png)`;
        field.dataset.type = activeElement;

        // console.log('input[value='+ field.dataset.position +']');

        // if there is an element that has been changed, just change the value
        var changedElement = document.querySelectorAll('input[value='+ field.dataset.position +']');
        if (changedElement.length > 0) {
            changedElement.value = field.dataset.position;
        } else {
            // otherwise create a new element and append a value to it
            var changeNode = document.createElement('input');
            changeNode.setAttribute('type', 'hidden');
            changeNode.setAttribute('name', field.dataset.position);
            changeNode.value = activeElement;
          
            changes.appendChild(changeNode);
        }
    },
    changeActive: function() {
        activeElement = this.value;
    },
    countElements: function (elementName) {
        let count = document.querySelectorAll("td[data-type="+elementName+"]");
        return count.length - 1;
    }
};