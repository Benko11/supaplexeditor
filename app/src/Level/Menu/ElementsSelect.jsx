import React, { Component } from "react";

class ElementsSelect extends Component {
  state = {
    elements: []
  };

  componentDidMount() {
    this.setState({ elements: this.props.elements });
  }

  showElementsSelect() {
    let items = [];

    this.state.elements.map(el => {
      items.push(<option value="">{el}</option>);
      return true;
    });

    return items;
  }

  render() {
    return (
      <select name="elements" id="elements">
        <option>fddf</option>
        {this.showElementsSelect()}
      </select>
    );
  }
}

export default ElementsSelect;
