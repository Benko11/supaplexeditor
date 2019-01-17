require('./constants');

import 'jquery';
import 'popper.js';
import 'bootstrap';

require('./components/Field');
require('./components/Menu/Menu');

let letters = [49, 50, 51, 52, 53, 54, 55, 56, 57, 48, 81, 87, 69, 82, 84, 89, 85, 73, 79, 80, 219, 65, 83, 68, 70, 71, 72, 73, 74, 75, 76, 186, 90, 88, 67, 86, 66, 77, 188, 190, 191];

document.addEventListener('keydown', e => {
    let elements = document.getElementById('elements');

    let i = 0;
    for (let value of letters) {
        i++;

        if (e.which === value) {
            elements.selectedIndex = i - 1;
            break;
        }
    }
});