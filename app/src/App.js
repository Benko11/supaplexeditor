import React, { Component } from "react";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import "./App.scss";
import Level from "./Level/Level";
import * as Config from "./config";

class App extends Component {
  render() {
    document.querySelector("title").innerText = Config.appName;

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
