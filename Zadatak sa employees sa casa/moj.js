//zadatak 1 dovuci sve usere
function getAllUsers(){
    var request = new XMLHttpRequest;
    request.addEventListener('load', function(event){
        var data = JSON.parse(event.currentTarget.response);
        var employees = data.data;
        console.log(employees);
    });
    request.open('GET', 'https://dummy.restapiexample.com/api/v1/employees');
    request.send();
}
//getAllUsers();

//zadatak 2

var myBtn = document.getElementById('myBtn');
myBtn.addEventListener('click', sacuvatiUsereULocalStorage);

//zadatak 3

function sacuvatiUsereULocalStorage(){
    var request = new XMLHttpRequest;
    request.addEventListener('load', function(event){

        var employeeDetail = document.getElementById('employee-detail');
        employeeDetail.innerHTML = '';
        
        var data = JSON.parse(event.currentTarget.response);
        var zaposleni = data.data;
        localStorage.setItem('useri', JSON.stringify(zaposleni));
        var employees = JSON.parse(localStorage.getItem('useri'));
        //console.log(employees);

        var unorderedList = document.getElementById('employees-list');
        for (var employee of employees) {
            var list = document.createElement('li');
            list.innerHTML = employee.employee_name +" "+ employee.employee_salary;
            function passId(id){
                list.addEventListener('click', function(){
                    singleEmployee(id);
                })
            }
            passId(employee.id);
            unorderedList.appendChild(list);
        }

    });
    request.open('GET', 'https://dummy.restapiexample.com/api/v1/employees');
    request.send(); 
}

function singleEmployee(id){
    var request = new XMLHttpRequest;
    request.addEventListener('load', function(event){
        
        var data = JSON.parse(event.currentTarget.response);
        var zaposleni = data.data;
        
        var unorderedList = document.getElementById('employees-list');
        unorderedList.innerHTML = '';
        
        var employeeDetail = document.getElementById('employee-detail');
        var p = document.createElement('p');
        p.innerHTML = zaposleni.id + " </br>" + zaposleni.employee_name +"</br>" + 
                        zaposleni.employee_salary+"</br>";
        employeeDetail.appendChild(p);
        var btn = document.createElement('button');
        btn.textContent = '<- Back';
        employeeDetail.appendChild(btn);
        btn.addEventListener('click', sacuvatiUsereULocalStorage);
        console.log(zaposleni);
    });
    request.open('GET', 'https://dummy.restapiexample.com/api/v1/employee/'+id);
    request.send(); 
}
