import React, { Component } from "react";
import "./Field.scss";

class Field extends Component {
  state = {
    elements: [],
    elementsImages: []
  };

  constructor() {
    super();

    document.querySelector(".field");
  }

  render() {
    return (
      <table className="field">
        <tbody>{this.props.children}</tbody>
      </table>
    );
  }
}

export default Field;
