import React, { Component } from "react";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import Level from "./components/Field/Level/Level";

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <Switch>
          <Route exact path="/" component={Level} />
        </Switch>
      </BrowserRouter>
    );
  }
}

export default App;
