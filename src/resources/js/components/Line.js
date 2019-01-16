import React, { Component } from 'react';

export default class Line extends Component {
    render() {
        return (
            <tr>{this.props.children}</tr>
        );
    }
}