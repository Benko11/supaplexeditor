import React, { Component } from "react";
import MenuItem from "./MenuItem";

class Menu extends Component {
  render() {
    return (
      <div className="menu">
        <div className="row">
          <MenuItem image="upport-transparent" />
          <MenuItem image="terminal" />
          <MenuItem image="infotron-transparent" />
          <MenuItem image="bug" />
          <MenuItem image="electron-transparent" />
          <MenuItem image="reddisk-transparent" />
        </div>
      </div>
    );
  }
}

export default Menu;
