import React, { Component } from 'react';
import Axios from 'axios';

/**
 * Renders the render of an individual element.
 */
export default class Element extends Component {
    constructor(props) {
        super(props);
    }

    elementById(id) {
        return JSON.parse(localStorage.getItem('elementsImages'))[id];
    }

    element(name) {
        return {
            background: `url('/icons/${name}.png')`
        };
    }
    
    render() {
        return (
            <td style={this.element(this.props.type)}
                data-type={this.props.type}
                data-position={`el-${this.props.position}`} />
        );
    }
}