import React, { Component } from "react";
import Axios from "axios";
import Field from "./Field/Field";
import Row from "./Row";
import Item from "./Item";
import Menu from "./Menu/Menu";

class Level extends Component {
  state = {
    elements: [],
    elementsImages: [],
    levelID: this.props.match.params.id,
    levelData: {
      id: null,
      capacity: null,
      width: null,
      height: null,
      name: null,
      infotrons: null,
      infotronsAll: null,
      gravity: false,
      freezeZonks: false,
      level: []
    },
    levels: []
  };

  componentDidMount() {
    this.setLevel(this.state.levelID);
    this.setElements(true);
    this.setLevels();
  }

  setLevels() {
    Axios.get(`${this.props.apiServer}/${this.props.apiPrefix}/levels`)
      .then(response => this.setState({ levels: response.data.data }))
      .catch(error => console.log(error.response));
  }

  setLevel(id) {
    Axios.get(`${this.props.apiServer}/${this.props.apiPrefix}/levels/${id}`)
      .then(response => this.setState({ levelData: response.data.data }))
      .catch(error => console.log(error.response));
  }

  setElements(withImages) {
    Axios.get(`${this.props.apiServer}/${this.props.apiPrefix}/elements`)
      .then(response => this.setState({ elements: response.data.data }))
      .catch(error => console.log(error.response));

    if (withImages) {
      Axios.get(
        `${this.props.apiServer}/${this.props.apiPrefix}/elements/images`
      )
        .then(response => this.setState({ elementsImages: response.data.data }))
        .catch(error => console.log(error.response));
    }
  }

  showLevel() {
    let rows = [];
    let rowData = [];

    let id = 0;
    let rowId = 0;
    this.state.levelData.level.map(el => {
      let item = <Item id={id} key={id} type={this.state.elementsImages[el]} />;
      rowData.push(item);

      if ((+id + 1) % this.state.levelData.width === 0) {
        rows.push(<Row key={rowId}>{rowData}</Row>);
        rowData = [];
        rowId++;
      }
      id++;

      return true;
    });

    return rows;
  }

  render() {
    return (
      <React.Fragment>
        <Field>{this.showLevel()}</Field>
        <Menu
          elements={this.state.elements}
          levelData={this.state.levelData}
          levelId={this.state.levelID}
          levels={this.state.levels}
        />
      </React.Fragment>
    );
  }
}

export default Level;

Level.defaultProps = {
  apiServer: "http://localhost:3002",
  apiPrefix: "api/v1"
};
