import React, { Component } from "react";
import Modal from "../../../helpers/Modal/Modal";
import * as Config from "../../../config";

class AboutModal extends Component {
  render() {
    return (
      <Modal title="About" name="aboutModal">
        <p>
          {Config.appName} <br /> {Config.appVersion}
        </p>

        <p>
          <a href={Config.web} target="_blank">
            Try it out online
          </a>
        </p>

        <p>
          Developed and managed by{" "}
          <a href={Config.author.web} target="_blank">
            {Config.author.name}
          </a>
        </p>
      </Modal>
    );
  }
}

export default AboutModal;
