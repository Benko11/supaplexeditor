import React, { Component } from "react";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import Index from "./components/Index";

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <Switch>
          <Route path="/" component={Index} />
        </Switch>
      </BrowserRouter>
    );
  }
}

export default App;
