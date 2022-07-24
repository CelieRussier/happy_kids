const divRatingZone = document.getElementById('container-rating-zone');
const count = divRatingZone.getElementsByTagName('div').length;
const newDiv = document.createElement('div');
newDiv.innerHTML = count + 'résultats';
const divFilterByAge = document.getElementById('filter_by_age');
divFilterByAge.appendChild(newDiv);