/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';


// loads the jquery package from node_modules
import $ from 'jquery';

import test from './test';

$(document).ready(function () {
    $('data').prepend('<h3>' + test('jill') + '</h3>');
});