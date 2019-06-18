import React from "react";

const MenuItem = props => {
  return (
    <div className="col">
      <div className="menu-item">
        <div className={props.image} />
      </div>
    </div>
  );
};

export default MenuItem;
