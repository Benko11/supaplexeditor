import React from 'react';
import ReactDOM from 'react-dom';
import Line from './Line';
import Element from './Element';
import Axios from 'axios';
import App from './App';

/**
 * Represents the render of the entire level.
 */
export default class Field extends Element {
    constructor(props) {
        super(props);

        this.app = new App;

        // if (!localStorage.getItem('level42')) {
            Axios.get(`${API_URL}/api/v1/levels/${this.app.levelID}`)
                .then(response => {
                    if (!localStorage.getItem('width')) {
                        localStorage.setItem('width', response.data.data.width);
                    }
                    localStorage.setItem(`level${this.app.levelID}`, JSON.stringify(response.data.data.level));
                });
        // }    

        this.level = localStorage.getItem(`level${this.app.levelID}`);
        this.level = JSON.parse(this.level);

        if (!localStorage.getItem('elementsImages')) {
            Axios.get(`${API_URL}/api/v1/elements/images`)
                .then(response => {
                    localStorage.setItem('elementsImages', JSON.stringify(response.data.data));
                });
        }

        if (!localStorage.getItem('elements')) {
            Axios.get(`${API_URL}/api/v1/elements`)
                .then(response => {
                    localStorage.setItem('elements', JSON.stringify(response.data.data));
                });
        }
    }

    getElements() {
        let lines = [];
        let lineData = [];

        for (let id in this.level) {
            let element = <Element type={this.elementById(this.level[id])} key={id} position={`el-${id}`} />;
            lineData.push(element);
            
            if ((+id + 1) % localStorage.getItem('width') == 0) {
                lines.push(<Line>{lineData}</Line>);
                lineData = [];
            }
        }
        return lines;
    }

    render() {
        return (
            <table id="field">
                <tbody>
                    {this.getElements()}
                </tbody>
            </table>
        );
    }
}

ReactDOM.render(<Field />, document.getElementById('app'));