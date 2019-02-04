import React, { Component } from "react";
import "./Menu.scss";
import LevelWindow from "./LevelWindow";
import ElementsSelect from "./ElementsSelect";
import { Link } from "react-router-dom";

// images
import cursor from "../../assets/images/selection/cursor.png";
import emptySquare from "../../assets/images/selection/empty-square.png";
import fullSquare from "../../assets/images/selection/full-square.png";
import Button from "../../helpers/Modal/Button";
import Modal from "../../helpers/Modal/Modal";
import AboutButton from "./About/AboutButton";
import AboutModal from "./About/AboutModal";

class Menu extends Component {
  minDigitsInNumber(min, number) {
    let zeros = "";
    let _min = min;

    for (_min; _min > 1; _min--) {
      let threshold = Math.pow(10, _min - 1);

      if (number < threshold) zeros += "0";
    }

    return zeros + number;
  }

  showLevels() {
    let levelList = [];

    let id = 0;
    this.props.levels.map(el => {
      levelList.push(
        <li key={id}>
          <Link to={`/level/${id + 1}`} className="dropdown-item">
            <span className="mr-3">{this.minDigitsInNumber(3, id + 1)}</span>{" "}
            {el}
          </Link>
        </li>
      );
      id++;

      return true;
    });

    return levelList;
  }

  render() {
    return (
      <React.Fragment>
        <section className="mainMenu">
          <form action="" name="changes" method="post">
            <LevelWindow levelData={this.props.levelData} />

            <div className="dropup">
              <div className="levelsButton" data-toggle="dropdown">
                Levels
              </div>

              <div className="dropdown-menu details">
                <ul>{this.showLevels()}</ul>
              </div>
            </div>

            <ElementsSelect elements={this.props.elements} />
            <button className="save" type="submit" name="submit">
              Save
            </button>

            <a href="" className="selection-button active">
              <img src={cursor} alt="Mouse" />
            </a>
            <a href="" className="selection-button">
              <img src={emptySquare} alt="Empty square" />
            </a>
            <a href="" className="selection-button">
              <img src={fullSquare} alt="Full square" />
            </a>

            <AboutButton />
          </form>
        </section>

        <AboutModal />
      </React.Fragment>
    );
  }
}

export default Menu;
