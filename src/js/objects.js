let editObj = {
    changeElement: function(field) {
        field.style.background = `url(src/icons/${activeElement}.png)`;
        field.dataset.type = activeElement;
    },
    changeActive: function() {
        activeElement = this.value;
    },
    countElements: function (elementName) {
        let count = document.querySelectorAll("td[data-type="+elementName);
        return count.length - 1;
    }
};