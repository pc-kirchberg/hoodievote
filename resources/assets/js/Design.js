import React from 'react';


export default class Design extends React.Component {
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
            <div className={`design ${this.state.selected ? 'selected' : ''}`} onClick={this._toggleSelected}>
                <img src={this.props.item} width="250" />
            </div>
        )
    }
}
