import React, { Component } from 'react';

/**
 * Represents one line in a Supaplex level.
 */
export default class Line extends Component {
    render() {
        return (
            <tr>{this.props.children}</tr>
        );
    }
}