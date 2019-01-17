import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Menu extends Component {
    constructor(props) {
        super(props);
    }

    getElementsImages() {
        let elementsImages = JSON.parse(localStorage.getItem('elementsImages'));
        let elements = JSON.parse(localStorage.getItem('elements'));
        let data = [];

        for (let id in elementsImages) {
            let image = elementsImages[id];
            let name = elements[id];

            data.push(<label htmlFor={id}><img src={`/icons/${image}.png`} alt={name} /></label>);
            data.push(<input type="radio" name="elements" value={image} id={id} />);
            data.push(<br />);
            // data.push(<p>{elementsImages[id]} {elements[id]}</p>);
        }

        return data;
    }

    render() {
        return (
            <div id="elements">
                {this.getElementsImages()}
            </div>
        );
    }
}

ReactDOM.render(<Menu />, document.getElementById('menu'));