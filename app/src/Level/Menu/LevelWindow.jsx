import React, { Component } from "react";

class LevelWindow extends Component {
  state = {
    gravity: null
  };
  setGravityToggle = e => {};

  componentDidMount() {
    this.setState({ gravity: this.props.levelData.gravity });
  }

  render() {
    return (
      <div className="dropup">
        <div className="levelButton" data-toggle="dropdown">
          Level {this.props.levelData.id}
        </div>

        <div className="details level-details dropdown-menu">
          <p>{this.props.levelData.name}</p>

          <p>
            <input
              type="text"
              name="infotronsNeeded"
              maxLength="3"
              className="needed"
              defaultValue={this.props.levelData.infotrons}
            />

            <span className="available" id="infotronsAvailable">
              {this.props.levelData.infotronsAll}
            </span>
          </p>

          <p>
            <input
              type="checkbox"
              name="gravity"
              className="toggle"
              id="gravity-toggle"
              defaultChecked={this.props.levelData.gravity}
              onChange={this.setGravityToggle}
            />
            <label htmlFor="gravity-toggle">Gravity</label>

            <input
              type="checkbox"
              name="freezeZonks"
              className="toggle"
              id="freeze-zonks-toggle"
            />
            <label htmlFor="freeze-zonks-toggle">Freeze Zonks</label>
          </p>
        </div>
      </div>
    );
  }
}

export default LevelWindow;
