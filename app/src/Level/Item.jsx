import React, { Component } from "react";

class Item extends Component {
  state = {};

  getName() {}

  render() {
    return (
      <td className={this.props.type} data-position={`el-${this.props.id}`} />
    );
  }
}

export default Item;
