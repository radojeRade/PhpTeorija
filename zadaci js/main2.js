// function Macka(ime, majka= 'nepoznata', otac='nepoznat'){
//     this.ime = ime;
//     this.majka = majka;
//     this.otac = otac;
//     // this.mjau = function(){
//     //     return this.ime +' kaze mjau';
//     // }
// }
// Macka.prototype.mjau = function(){
//         return this.ime +' kaze mjau';
//     }
// var maca = new Macka('Cvrle');
// console.log(maca.mjau());

// //zadatak 2

// function Racun (brRacuna, banka, vlasnik, stanje){
//     this.brRacuna = brRacuna;
//     this.banka = banka;
//     this.vlasnik = vlasnik;
//     this.stanje = stanje;
// }
// function Banka(ime){
//     this.ime = ime;
//     this.racuni = [];
//     this.dodajRacun = function(imeVlasnika, pocStanje, brRacuna){
//         var racun1 = new Racun(brRacuna, this, imeVlasnika, pocStanje);
//         this.racuni.push(racun1);
//         return racun1;
//     }
// }
// var intesa = new Banka('Intesa');
// console.log(intesa);
// intesa.dodajRacun('mare', 150, '00001111');
// intesa.dodajRacun('zare', 650, '20001111');
// //zadatak 3

// // function Image(src){
// //     this.src = src
// // }
// // var src = new Image('http://amolife.com/image/images/stories/Animals/cute_kitten_12.jpg');
// // document.body.appendChild(src);

// function Vozilo(tip){
//     this.tip = tip;
// }
// Vozilo.prototype.vozi = function(){
//     return 'vozilo tipa '+ this.tip+ ' vozi';
// }
// function Automobil() {
//     Vozilo.call(this, 'Automobil');
// }
// Automobil.prototype = Object.create(Vozilo.prototype);
// var auto = new Automobil();
// console.log(auto, auto.vozi());
// var vozilo = new Vozilo('Kamijon');

// //zadatk 3
// function Cetvorougao(a,b,c,d){
//     this.a = a;
//     this.b = b;
//     this.c = c;
//     this.d = d;
// }
// Cetvorougao.prototype.suma = function(){
//     return this.a+this.b+this.c+this.d;
// }
// var sum = new Cetvorougao(1,2,3,4);
// console.log(sum.suma());
// //zadatak 4

// function Pravougaonik(a,b){
//     Cetvorougao.call(this,a,b,a,b)
// }
// //Pravougaonik.prototype = Object.create(new Cetvorougao(this.a, this.b, this.a, this.b));
// Pravougaonik.prototype.povrsina = function(){
//     return this.a*this.b;
// }
// var prav = new Pravougaonik(2,2);
// console.log(prav);

//zadaci kod kuce vezba zadatak 1

function Macka(ime, majka='nepoznata', otac='nepoznat'){
    this.ime = ime;
    this.majka = majka;
    this.otac = otac;
}
Macka.prototype.mjau = function(){
    return `${this.ime} kaze MJAU!`;// ovo je template literal
}
var cvrle = new Macka('Cvrle');
console.log(cvrle.mjau());

// zadatak 2

function Racun(brojRacuna, banka, vlasnik, stanje){
    this.brojRacuna = brojRacuna;
    this.banka = banka;
    this.vlasnik = vlasnik;
    this.stanje = stanje;

}

function Banka(ime){
    this.ime = ime;
    this.racuni = [];
}
Banka.prototype.dodajRacun = function(brojRacuna, vlasnik, stanje){
    var racun1 = new Racun(brojRacuna, this, vlasnik, stanje);
    this.racuni. push(racun1);
    return racun1;
}

var banka = new Banka('Intesa');
var mare = new Racun('22000036',banka, 'Mare', 650);
banka.dodajRacun(mare.brojRacuna, mare.vlasnik, mare.stanje);
console.log(banka);

// zadatak 3

var image = new Image();
image.src = 'http://amolife.com/image/images/stories/Animals/cute_kitten_12.jpg';
document.body.appendChild(image);

//zadatak 4

function Vozilo(tip){
    this.tip = tip;
    this.vozi = function(){
        return `${this.tip} se vozi!`;
    }
}
var auto = new Vozilo("Automobil");
function Automobil(){
    //Vozilo.call(this, 'Automobil');
}
Automobil.prototype = auto;// Drugi nacin bez call
var kola = new Automobil();
console.log(kola.tip, kola.vozi());

//zadatak 5

function Cetvorougao(a,b,c,d){
    this.a = a;
    this.b = b;
    this.c = c;
    this.d = d;
}
Cetvorougao.prototype.suma = function(){
    return this.a+this.b+this.c+this.d;
}
var sum = new Cetvorougao(1,2,3,4);
console.log(sum.suma());
//zadatak 6 nastavlja se na prethodni

function Pravougaonik(a, b){
     this.a = a;
    this.b = b;
    Cetvorougao.call(this,a, b, a, b);
}
Pravougaonik.prototype = Object.create(Cetvorougao.prototype);
Pravougaonik.prototype.povrsina = function(){
    return this.a*this.b;
}

var prav = new Pravougaonik(2, 2);
console.log(prav.suma(), prav.povrsina());
