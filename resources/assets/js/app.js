import $ from 'jquery';
import 'minimount';
import './Votes';
import './countdown';

window.$ = $.noConflict();

require('./mq4HoverShim');

$(document).on('mq4hsChange', function (e) {
    $(document.body).toggleClass('hover-ok', e.trueHover);
});