const changes = document.forms['changes'];
let editObj = {
    changeElement: function(field) {
        field.style.background = `url(src/icons/${activeElement}.png)`;

        var changedElement = document.querySelectorAll('input[name='+ field.dataset.position +']');
        if (changedElement.length > 0) {
            changedElement.value = activeElement;
        } else {
            // create a new element
            var changeNode = document.createElement('input');
            changeNode.setAttribute('type', 'hidden');
            changeNode.setAttribute('name', field.dataset.position);
            changeNode.value = activeElement;

            changes.appendChild(changeNode);
        }
    },
    changeActive: function() {
        activeElement = this.value;
    }
};