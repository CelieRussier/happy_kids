/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
import 'bootstrap';

// start the Stimulus application
import './bootstrap';

//const button = document.getElementById('open-rating');
const button = document.getElementById('open-rating');
const ratingZone = document.getElementById('rating-zone');

button.addEventListener('click', event => {
    if( ratingZone.style.display == "none") {
    ratingZone.style.display = "flex";
    button.innerHTML = '---';
    }
});