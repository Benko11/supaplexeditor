import React, { Component } from "react";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import Field from "./components/Field/Field";

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <Switch>
          <Route exact path="/" component={Field} />
        </Switch>
      </BrowserRouter>
    );
  }
}

export default App;
