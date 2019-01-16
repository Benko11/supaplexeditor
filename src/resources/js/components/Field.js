import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Line from './Line';
import Element from './Element';
import Axios from 'axios';

export default class Field extends Element {
    constructor(props) {
        super(props);

        if (!localStorage.getItem('elements')) {
            Axios.get(`${API_URL}/api/v1/elements/images`)
                .then(response => {
                    localStorage.setItem('elements', JSON.stringify(response.data.data));
                });
        }

        if (!localStorage.getItem('level42')) {
            Axios.get(`${API_URL}/api/v1/levels/42`)
                .then(response => {
                    if (!localStorage.getItem('width')) {
                        localStorage.setItem('width', response.data.data.width);
                    }
                    localStorage.setItem(`level42`, JSON.stringify(response.data.data.level));
                });
        }

        this.level = localStorage.getItem('level42');
        this.level = JSON.parse(this.level);
    }

    elements() {
        let lines = [];
        let lineData = [];

        for (let id in this.level) {
            let element = <Element type={this.elementById(this.level[id])} key={id} position={`el-${id}`} />;
            lineData.push(element);
            
            if ((+id + 1) % localStorage.getItem('width') == 0) {
                console.log(lineData);
                
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
                    {this.elements()}
                </tbody>
            </table>
        );
    }
}

ReactDOM.render(<Field />, document.getElementById('app'));