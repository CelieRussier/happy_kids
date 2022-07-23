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
const buttons = document.querySelectorAll('#open-rating');
const ratingZones = document.querySelectorAll('.rating-zone');

for (const button of buttons) {
    for (const ratingZone of ratingZones) {
        button.addEventListener('click', event => {
            if( ratingZone.style.display == "none") {
                ratingZone.style.display = "initial";
                button.innerHTML= "Masquer les évaluations";
            
            } else {
                ratingZone.style.display= "none";
                button.innerHTML= "Afficher les évaluations";
            }
        });
    }
};

//button.addEventListener ('click', function () {
//    if (window.matchMedia("(max-width: 800px)").matches) {
//  
//        if (cardDescription.style.display == "none") {
//        cardDescription.style.display = "flex";
//        card.style.backgroundColor = "black";
//        cardBody.style.color= "var(--main-second-color)";
//        cardTitle.style.color= "white";
//  
//        } else {cardDescription.style.display= "none";
//                card.style.backgroundColor= "white";
//                cardBody.style.color= "black";
//                cardTitle.style.color= "black";
//                ;}
//    };
  
//  }