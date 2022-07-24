/* Show or hide ratings */

    /* !!!!initialize ratingZone display!!! to avoid having to click twice to show ratings...!!!! */
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