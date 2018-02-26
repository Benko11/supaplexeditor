const changes = document.forms['changes'];
let editObj = {
    changeElement: function(field) {
        field.style.background = `url(src/icons/${activeElement}.png)`;

        console.log('input[value='+ field.dataset.position +']');
        var changedElement = document.querySelectorAll('input[value='+ field.dataset.position +']');
        if (changedElement.length > 0) {
            console.log('crap');
        } else {
            var changeNode = document.createElement('input');
            changeNode.setAttribute('type', 'hidden');
            changeNode.setAttribute('name', 'changes[]');
            changeNode.value = field.dataset.position;

            changes.appendChild(changeNode);
            console.log(changes.children);
        }
    },
    changeActive: function() {
        activeElement = this.value;
    }
};