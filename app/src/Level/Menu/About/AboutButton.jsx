import React, { Component } from "react";
import Button from "../../../helpers/Modal/Button";

class AboutButton extends Component {
  state = {};
  render() {
    return (
      <Button className="about" name="aboutModal">
        About
      </Button>
    );
  }
}

export default AboutButton;
