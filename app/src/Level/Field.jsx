import React, { Component } from "react";

class Field extends Component {
  state = {
    elements: [],
    elementsImages: []
  };

  render() {
    return (
      <table className="field">
        <tbody>{this.props.children}</tbody>
      </table>
    );
  }
}

export default Field;
