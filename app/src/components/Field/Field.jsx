import React, { Component } from "react";
import Level from "./Level/Level";
import Menu from "./Menu/Menu";

class Field extends Component {
  render() {
    return (
      <React.Fragment>
        <Level />

        <Menu />
      </React.Fragment>
    );
  }
}

export default Field;
