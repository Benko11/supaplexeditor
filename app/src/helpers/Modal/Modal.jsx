import React, { Component } from "react";

class Modal extends Component {
  state = {};
  render() {
    return (
      <React.Fragment>
        <div
          className="modal fade"
          id={this.props.name}
          tabIndex="-1"
          role="dialog"
          aria-labelledby={`${this.props.name}Label`}
          aria-hidden="true"
        >
          <div className="modal-dialog" role="document">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title">{this.props.title}</h5>
              </div>
              <div className="modal-body">{this.props.children}</div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Leave
                </button>
              </div>
            </div>
          </div>
        </div>
      </React.Fragment>
    );
  }
}

export default Modal;
