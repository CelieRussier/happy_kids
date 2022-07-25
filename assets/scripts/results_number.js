const divRatingZone = document.getElementById('container-rating-zone');
const count = divRatingZone.getElementsByClassName('activity-card').length;
const newDiv = document.createElement('div');
newDiv.innerHTML = count + ' résultats';
const divFilterByAge = document.getElementById('filter_by_age');
divFilterByAge.appendChild(newDiv);