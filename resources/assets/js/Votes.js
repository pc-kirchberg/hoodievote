import React from 'react';
import minimount from 'minimount';
import Design from './Design';
import Colour from './Colour';
import objectValues from 'object-values';

export default class Votes extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            selected: {},
            valid: false
        };
        this._updateSelection = this.updateSelection.bind(this);
        this._hasAtLeastOneTrue = selected => objectValues(selected).reduce((prev, curr) => prev ? prev : curr);
        this._arrayOfTrues = selected => Object.keys(selected).reduce(
            (prev, curr) => selected[curr] ? prev.concat([curr]) : prev
        , []);
        this._submit = this.submit.bind(this);
    }

    updateSelection(id, selected) {
        const newSelected = Object.assign(this.state.selected, {
            [id]: selected
        });
        this.setState({
            selected: newSelected,
            valid: this._hasAtLeastOneTrue(newSelected)
        });
    }

    submit() {
        if(!this.state.valid) {
            alert('Please check that you have selected at least one design');
            return;
        }
        const selected = this._arrayOfTrues(this.state.selected);
        const path = `/${this.props.submitLocation}?selected=${encodeURIComponent(JSON.stringify(selected))}`;
        console.log(path);
        window.location.href = path;
    }

    render() {
        const Clazz = this.props.type === 'Design' ? Design : Colour;
        return (
            <div>
                <div className="designs">
                    {this.props.votables.map((design, index) => (
                        <Clazz item={design} id={index} key={index} updateCallback={this._updateSelection}/>
                    ))}
                </div>
                <div>
                    {this.state.valid ?
                        <button className='submitButton submit valid' onClick={this._submit}>
                            Submit votes
                        </button>
                        :
                        <div className='submit invalid'>{`You must select at least one ${this.props.type.toLowerCase()} to proceed.`}</div>
                    }
                </div>
            </div>
        );
    }
}
minimount.register('Votes', Votes);
