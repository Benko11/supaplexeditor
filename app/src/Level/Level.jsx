import React, { Component } from "react";
import Axios from "axios";
import Field from "./Field";
import Row from "./Row";
import Item from "./Item";

class Level extends Component {
  state = {
    elements: [],
    elementsImages: [],
    levelID: this.props.match.params.id,
    levelData: {
      capacity: null,
      width: null,
      height: null,
      name: null,
      infotrons: null,
      infotronsAll: null,
      gravity: false,
      freezeZonks: false,
      level: []
    }
  };

  componentDidMount() {
    this.setLevel(this.state.levelID);
    this.setElements(true);
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
    });

    return rows;
  }

  render() {
    return (
      <React.Fragment>
        <Field>{this.showLevel()}</Field>
      </React.Fragment>
    );
  }
}

export default Level;

Level.defaultProps = {
  apiServer: "http://localhost:3002",
  apiPrefix: "api/v1"
};
