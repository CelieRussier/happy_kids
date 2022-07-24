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

/* Show or hide ratings */

    /* initialize ratingZone display */
const buttons = document.querySelectorAll('#open-rating');
const ratingZones = document.querySelectorAll('.rating-zone');
if (window.matchMedia("(max-width: 979px)").matches) {
    for( const ratingZone of ratingZones) {
        ratingZone.style.display = "none";
    }
};

    /* show or hide rating */
for (const button of buttons) {
    for (const ratingZone of ratingZones) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            if( ratingZone.style.display == "none") {
                ratingZone.style.display = "initial";
                button.innerHTML= "Masquer les évaluations";
            
            } else {
                ratingZone.style.display = "none";
                button.innerHTML= "Afficher les évaluations";
            }
        });
    }
};

/* reinitialize filter */
const reinitializeBtn = document.getElementById('reinitialize');

reinitializeBtn.addEventListener("click", reinitialize => {
    console.log('youpi');
    const url = `path('/)`;
    fetch(url)
      .then(function() {
        window.location.href = '/';;
    })
});