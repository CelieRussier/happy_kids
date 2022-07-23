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
const buttons = document.querySelectorAll('#open-rating');
const ratingZones = document.querySelectorAll('.rating-zone');

for (const button of buttons) {
    for (const ratingZone of ratingZones) {
        button.addEventListener('click', event => {
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


/* filter by age */

/* it's a fail :-(
const searchBtn = document.getElementById('search');

const inputZeroThree = document.querySelector('input[name="0-3ans"]');
const inputThreeSix = document.querySelector('input[name="3-6ans"]');
const inputSixTwelve = document.querySelector('input[name="6-12ans"]');
const inputTwelveNineNine = document.querySelector('input[name="12-99ans"]');

const activityCards = document.querySelectorAll('div.activity-card');
//activityCards.classList.add('hidden'); fonctionne

const ems = document.querySelectorAll('em.zero-three');

searchBtn.addEventListener('click', filter => {
    for (const em of ems) {
        for (let i = 0; i < length(ems); i++){
            for (const activityCard of activityCards) {
                em.classList.add('i');
                if (inputZeroThree.checked == true) {
                    const em = document.querySelector('em.zero-three').innerHTML;
                    console.log('NOOOOO');
                    if ( em >= 3 ) {
                        activityCard.classList.add('hidden');
                    }
                }
            }
        }
    }  
});*/