import React, { Component } from "react";
const axios = require("axios");

class Level extends Component {
  state = {
    data: {
      id: null,
      capacity: null,
      width: null,
      height: null,
      name: null,
      infotrons: null,
      infotronsAll: null,
      gravity: null,
      freezeZonks: null,
      level: []
    }
  };

  componentDidMount() {
    axios
      .get("http://localhost:3003/api/v1/levels/12")
      .then(data => console.log(data));
  }

  render() {
    return (
      <table className="field">
        <tbody>
          <tr>
            <td className="base" />
          </tr>
        </tbody>
      </table>
    );
  }
}

export default Level;
