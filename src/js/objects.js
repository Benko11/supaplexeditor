let editObj = {
    changeElement: function(field) {
        field.style.background = `url(./src/icons/${activeElement}.png)`;
    },
    changeActive: function() {
        activeElement = this.value;
    }
};