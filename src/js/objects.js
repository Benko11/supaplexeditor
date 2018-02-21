let editObj = {
    changeElement: function(field) {
        field.style.background = `url(/icons/${activeElement}.png)`;
    },
    changeActive: function() {
        activeElement = this.value;
    }
};