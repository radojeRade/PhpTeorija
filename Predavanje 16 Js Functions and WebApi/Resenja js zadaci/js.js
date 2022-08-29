//3. Create a function that returns the squared value of a given number if the number is odd. 
//Otherwise (if it's even)
//returns the square root of a given number (Use built in Math.sqrt() function).

function retVal(num){
    if(num%2!= 0){
        return Math.pow(num,2);
    }else{
        return Math.sqrt(num);
    }
}
console.log(retVal(100));

//4. Create a function that, for a given string, returns a new string with all letters sorted alphabetically.
// We can use built in methods:
// string.split('') -  splits string to array with letters as elements
// array.sort() - sorts the array
// array.join('') - joins all array elements into a string
// Strings can be compared with > and <, for example 'b' > 'a'

// Example input: 'javascript'
// Example output: 'aacijprstv'

function sortAlphabetically(string){
    var c = string.split("");
    c.sort();
    var string = c.join("");
    return string;
}
console.log(sortAlphabetically('javascript'));

//5. Create a function that takes an array as a parameter 
//and returns the last element of the given array.

function lastEl(array){
    return array[array.length-1];
}
console.log(lastEl([1,2,3,4]));

//6. Create a function that sums all elements of an array

function suma(array){
    var s = 0;
    array.forEach(element => {
        s += element;
    });
    return s;
}
console.log(suma([1,2,3]));

//7. Create an object square that has a 
// property A which is the length of its sides. 
// Add methods to this object that return the area and perimeter of this object. 
// (area = a * a; perimeter = 4 * a)

var square = {
    a: 5,
    area: function() {return this.a * this.a},
    perimeter: function() {return 4 * this.a},
    ispis: function(){
        return this.area() + " i " +this.perimeter();
    }
};
console.log(square.ispis());

//8. Create an object shape that has properties: sides (3) and color (green). 
// This object should also contain a method that will 
// return this object's info - getInfo() and console log e.g. "green shape with 3 sides.
// Call this method then change number of sides to 7 and  color to red and getInfo() again

  var shape = {
      sides: 7,
      color: 'red',
      getInfo: function(){
          return console.log(this.color + " shape with " +this.sides+ " sides");
      }
  };
  shape.getInfo();
  
//9. Write a function that accepts string and a callback function. 
//   If the string has less than 4 characters return the string, 
//   if it's longer, return the string converted to all-uppercase letters 
//   using the callback function.

function lessOrMore(string, callback){
    if(string.length < 4){
        return string;
    } else {
       return callback(string);
    }
}
function allUpper(string){
    return string.toUpperCase();
}

console.log(lessOrMore('radoje', allUpper));

// 10. Write a function that reverses the number. 
// Example x = 32243
// Output: 34223

function reverseNumber(num){
    var b = num.toString();
    var c = b.split("");
    var rev = c.reverse();
    var ret = rev.join("");
    return ret;
}

console.log(reverseNumber(332244));

// 11. Write a function that checks whether a passed string is palindrome or not. 
// A palindrome is word, phrase or sequence that reads 
// the same backward and forward eg. “madam” or “nurses run”
function palindrome(string){
    var c = string.split("");
    var rev = c.reverse();
    var ret = rev.join("");
    if (string === ret){
        return string+ " isto se cita unazad ";
    } else {
        return string+ " se ne cita isto unazad "+ret;
    }
}
console.log(palindrome('madam'));

// 13. Write a function that returns array elements larger than a 
// number given as the second parameter
var array1 = [];
function largerThan(array, num){
    array.forEach(element => {
        if(element > num){
            array1.push(element);
        }
    });
};
largerThan([2,3,5,6,7,9], 5);
console.log(array1);

//14. Write a function that generates a string of random characters (specified length).
var stringRandom = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvxyz";
var newStringLength = 10;

function randomString(string){
    var newString = '';
    for (var i = 0; i < newStringLength; i++) {
        var index = Math.floor(Math.random() * (string.length + 1));
        newString += string[index];
    }
    return newString;
}
console.log(randomString(stringRandom));

// fajl zadaci 1
//5. Za date stringove "1234", "1234.8", "10 Apples" i "John" 
// konvertovati ih u broj i ispisati u konzoli.
// Cilj: U JavaScript-u postoji ugradjena metoda za konvertovanje stringova u brojeve. 
// Obratiti paznju kako se ponasa parseInt() i parseFloat() za svaki string.

string1 = "1234";
string2 = "1234.18";
string3 = "10 apples";
string4 = "John";

console.log(parseFloat(string1));
console.log(parseFloat(string2));
console.log(parseFloat(string3));
console.log(parseInt(string4));

// 9. Za dati niz ["Audi", "BMW", "Ford", "Fiat"] u konzoli 
// ispisati sve clanove spojene znakom "/".
// Cilj: Iako ovo moze da se resi sa petljom, 
// takodje imamo i metodu join() koja prima string parametar za 
// delimiter (string kojim ce se spojiti clanovi).

var niz = ["Audi", "BMW", "Ford", "Fiat"];
var str3 = niz.join('/');
console.log(str3);


