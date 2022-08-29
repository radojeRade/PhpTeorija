// class Vozilo {
//     constructor(tip){
//         this.tip = tip;
//     }
	
// 	vozi() { console.log('tip vozila je ${this.tip}'); }
// }
// var auto = new Vozilo('Auto');
// auto.vozi();
//  class Automobil extends Vozilo {
//      constructor(){
         
//      }
//  }
//  var auto = new Automobil('Bmw');
// console.log(typeof Automobil);
// console.log(Automobil.prototype);
class Vozilo {
    constructor(tip){
        this.tip = tip;
    }
    vozi() { console.log(`tip vozila je ${this.tip}`);}
}
class Automobil extends Vozilo{
    constructor(){
        super('Automobil');
        
    }
    
    // vozi(){
    //     super.vozi()
    // }
}
var auto = new Vozilo('kamion');
var kola = new Automobil();
console.log(kola.vozi());

// zadatak cetvorougao

class Cetvorougao{
    constructor(a,b,c,d){
        this.a = a;
        this.b= b;
        this.c= c;
        this.d = d;
    }
    izracunajobim() {console.log(`${this.a + this.b + this.c + this.d}`);}
}
class Pravougaonik extends Cetvorougao{
    constructor(a,b){
        super(a, b, a, b);
           
    }
    izracunajPovrs() {console.log(`${this.a * this.b}`);}
}
var prav = new Pravougaonik(2,2);
console.log(prav);
