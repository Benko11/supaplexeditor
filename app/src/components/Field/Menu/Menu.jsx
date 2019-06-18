import React, { Component } from "react";
import MenuItem from "./MenuItem";
import Statusbar from "./Statusbar";

class Menu extends Component {
  render() {
    return (
      <React.Fragment>
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

        <Statusbar />
      </React.Fragment>
    );
  }
}

export default Menu;
