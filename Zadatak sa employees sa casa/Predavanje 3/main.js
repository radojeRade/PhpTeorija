// var myDiv = document.querySelector('#myDiv');
// var myBtn = document.querySelector('#myBtn');
// var myInput = document.querySelector('#myInput');



// myBtn.addEventListener('click', function () {
//   if (myInput.value !== '') {
//     myDiv.textContent = myInput.value;
//     myInput.value = '';
//   } 
// });

// var user = {
//   firstName: 'Florijan',
//   lastName: 'Nadj'
// }

// localStorage.setItem('user', JSON.stringify(user));

// var localStorageUser = JSON.parse(localStorage.getItem('user'));

// console.log(localStorageUser);

// var request = new XMLHttpRequest();

// request.addEventListener('load', function (event) {
//   console.log(event.currentTarget.responseText);
// });

// request.open('GET', 'https://dummy.restapiexample.com/api/v1/employees');
// request.send();

function getAllEmployees() { 
  var request = new XMLHttpRequest();
  request.addEventListener('load', function (event) {
    // Hendlamo back button - brisemo iz diva podatke START
    var div = document.getElementById('employee-detail');
    div.innerHTML = '';
    // END
    // Parsiramo string u objekat
    var data = JSON.parse(event.currentTarget.response);
  
    var employees = data.data;
    
    var unorderedList = document.getElementById('employees-list');

    // Ispisujemo for of petljom sve zaposlene
    for (var employee of employees) { 
      var listItem = document.createElement('li');
      listItem.innerHTML = employee.employee_name + ' ' + employee.employee_salary;
      
      // Funkcija sa kojim dobavljamo kliknutog zaposlenog
      function func1(employeeParam) { 
        var employeeId = employeeParam.id;

        listItem.addEventListener('click', function () {
          // Poziv funkcije i prosledjujemo id
          getSingleEmployee(employeeId);
        });
      }
      // Pozivamo funkciju i prosledjujemo zaposlenog
      func1(employee);
      unorderedList.appendChild(listItem);
    }
  });
  request.open('GET', 'https://dummy.restapiexample.com/api/v1/employees');
  request.send();
}

function getSingleEmployee(employeeId) { 
  var request = new XMLHttpRequest();
  request.addEventListener('load', function (event) {
    var data = JSON.parse(event.currentTarget.response);
    var employee = data.data;
    console.log(employee);
    // Prilaz podataka na stranici
    var unorderedList = document.getElementById('employees-list');
    unorderedList.innerHTML = '';
    var div = document.getElementById('employee-detail');

    // Name
    var p = document.createElement('p');
    p.textContent = employee.employee_name;
    div.appendChild(p);

    // Salary
    var p1 = document.createElement('p');
    p1.textContent = employee.employee_salary;
    div.appendChild(p1);

    // Age
    var p2 = document.createElement('p');
    p2.textContent = employee.employee_age;
    div.appendChild(p2);

    var btn = document.createElement('button');
    btn.textContent = '<- Back';
    div.appendChild(btn);
    btn.addEventListener('click', getAllEmployees);
  });
  request.open('GET', 'https://dummy.restapiexample.com/api/v1/employee/' + employeeId);
  request.send();
}

getAllEmployees();