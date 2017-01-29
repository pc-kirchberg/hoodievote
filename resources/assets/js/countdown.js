import React from 'react';
import countdown from 'countdown';
import minimount from 'minimount';

export default class Countdown extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      ts: ''
    };
  }

  componentDidMount() {
    countdown(
      ts => this.setState({ts}),
      1481497200000,
      countdown.DEFAULTS
    );
  }

  render() {
    return <span>{this.state.ts.toString()}</span>
  }
}

minimount.register('Countdown', Countdown);
window.Countdown = Countdown;
