import React, { Component } from "react";

class Button extends Component {
  state = {};
  render() {
    return (
      <button
        type="button"
        className={this.props.className}
        data-toggle="modal"
        data-target={`#${this.props.name}`}
      >
        {this.props.children}
      </button>
    );
  }
}

export default Button;
