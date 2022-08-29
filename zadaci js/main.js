//zadatak 1 
var unorderedList = document.querySelector('#list');
//zadatak 2 prvi child
console.log(unorderedList.children[0]);
//zadatak 3 prolazak kroz sve child-ove
for (let i = 0; i < unorderedList.children.length; i++) {
    console.log(unorderedList.children[i]);   
};
// zadatak 4 izmena teksta prvog child elementa
unorderedList.children[0].textContent = 'First item (edited)';
//zadatak 5 dodavanje novog child elementa
var newLi = document.createElement('li');
newLi.innerHTML = 'Novi element';
unorderedList.appendChild(newLi);
//zadatak 6 button sa alert
var myBtn = document.getElementById('myBtn');
myBtn.addEventListener('click', function(){
    alert('Button clicked');
});
//zadatak 7 input value u console  i zadatak 8 na klik kreiranje novog li elementa 
//uzimanje vrednosti inputa i dodavanje u ul

var addNew = document.getElementById('add-new');
addNew.addEventListener('click', function(){
    var newLi = document.createElement('li');
    var input = document.getElementById('inputEl');
    if(input.value !== ''){  
        console.log(input.value);
        newLi.innerHTML = input.value;
        unorderedList.appendChild(newLi);
        input.value = '';// zadatak 9 isprazniti input posle dodavanja
    }
});







