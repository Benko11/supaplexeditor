const changes = document.forms['changes'];
let editObj = {
    changeElement: function(field) {
        field.style.background = `url(icons/${activeElement}.png)`;
        field.dataset.type = activeElement;

        // if there is an element that has been changed, just change the value
        let changedElement = document.querySelectorAll('input[value='+ field.dataset.position +']');
        if (changedElement.length > 0) {
            changedElement.value = field.dataset.position;
        } else {
            // otherwise create a new element and append a value to it
            let changeNode = document.createElement('input');
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
        return count.length;
    },

    updateCounts: function (element) {
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
};

let mainMenu = {
    toggleLevelButton: function(){
        let popOverClass = this.className + '-details';
        let popOver = document.querySelector('.' + popOverClass);

        if (window.getComputedStyle(popOver).display === 'none') {
            popOver.style.display = 'inline';
        } else {
            popOver.style.display = 'none';
        }
    },

    toggleGravity: function() {
        if (this.classList.contains('on')) {
            this.classList.remove('on');
            this.classList.add('off');
        } else {
            this.classList.remove('off');
            this.classList.add('on');
        }
    },

    toggleFreezeZonks: function() {
        if (this.classList.contains('on')) {
            this.classList.remove('on');
            this.classList.add('off');
        } else {
            this.classList.remove('off');
            this.classList.add('on');
        }
    }
};