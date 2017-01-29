import React from 'react';


export default class Colour extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
          selected: false
        };
        this._toggleSelected = this.toggleSelected.bind(this);
    }

    toggleSelected() {
        const newSelected = !this.state.selected; // because we're not sure when the state update will happen
        this.setState({
            selected: newSelected
        });
        this.props.updateCallback(this.props.id, newSelected);
    }

    render() {
        return (
            <div
              className={`colour ${this.state.selected ? 'selected' : ''}`}
              onClick={this._toggleSelected}
              style={{backgroundColor: this.props.item}}
            >
            </div>
        )
    }
}
