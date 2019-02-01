import React, { Component } from "react";

class Row extends Component {
  state = {};
  render() {
    return <tr>{this.props.children}</tr>;
  }
}

export default Row;
