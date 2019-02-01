import React, { Component } from "react";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import "./App.scss";
import Level from "./Level/Level";

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <React.Fragment>
          <Switch>
            <Route path="/level/:id" component={Level} />
          </Switch>
        </React.Fragment>
      </BrowserRouter>
    );
  }
}

export default App;
