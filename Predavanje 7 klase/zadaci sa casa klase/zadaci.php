1. Napraviti klasu Macka, koja sadrži atribute ime, majka i otac. 
Ako majka i otac nisu prosleđeni, inicijalne vrednosti treba da budu stringovi "nepoznata" i "nepoznat".
Napisati metod mjau koji treba samo da ispiše "<ime> kaze mjau".
Napisati konstruktor koji prima tri argumenta, ime, majku i oca. Ukoliko jedan ili oba roditelja nisu zadati, oni treba da budu nepoznati.
Napraviti objekat klase Macka, sa imenom Cvrle i nepoznatim roditeljima

2.
Napraviti klasu Pravougaonik, koja sadrži atribute a, b i d (dijagonala). Sva tri atributa treba da budu private. 
Napisati konstruktor koji prima inicijalne vrednosti a i b, i izračunava dijagonalu po formuli 
sqrt($a * $a + $b * $b).
Dodati metode getA, getB i getD, koje vraćaju vrednosti odgovarajućih atributa. 
Dodati metode setA i setB, koje menjaju vrednost odgovarajućeg atributa i uz to postavljaju tačnu novu vrednost dijagonale.

3.
Modelirati jednostavan sistem bankarstva:
Napraviti klasu Racun koja sadrži atribute brojRacuna, banka, vlasnik i stanje. Broj racuna je public, ostali atributi su private.
Konstruktor klase Racun prima četiri argumenta, koji odgovaraju gorepomenutim atributima, i setuje ih.
Napraviti klasu Banka koja sadrži atribute ime (public) i niz racuni (private). 
U klasi Banka dodati metodu dodajRacun, koja kao argumente prima ime vlasnika, pocetno stanje i broj racuna, pravi novi objekat klase Racun, ubacuje ga u svoj niz racuni i vraća novostvoreni račun.

4.
Modelirati jednostavnu mobilnu mrežu:
Napraviti klasu SimKartica koja sadrži jedan atribut, brojTelefona (private), koji se setuje prilikom instanciranja objekta.
Napraviti klasu MobilnaMreza koja sadrzi ime (public, postavlja se prilikom kreiranja), i niz sim kartica sa nazivom sveSimKartice (private). Napisati metodu novaSimKartica koja kreira objekat klase SimKartica i dodaje je u niz sveSimKartice.
U klasu SimKartica dodati novi private atribut mreza, i novu public metodu postaviMrezu koja prima parametar novaMreza i postavlja ga u atribut mreza
Proširiti metodu novaSimKartica da nakon kreiranja objekta postavlja i mrežu pozivom metode  nad novokreiranim objektom. Mreža je u tom slučaju ceo objekat klase MobilnaMreza, ne samo ime mreže.


5.
Modelirati košarkaški klub
napraviti klasu Grad koja ima atribut ime (public). Prilikom kreiranja objekta ove klase postavlja se i atribut ime
napraviti klasu Igrac koja ima atribute ime, prezime i pozicija. Sva tri atributa su public i postavljaju se prilikom kreiranja objekta preko konstruktora
napraviti klasu Klub koja ima atribute ime, grad, datum_osnivanja i igraci (niz). Ime, grad i datum osnivanja se postavljaju prilikom kreiranja objekta
u klasu Klub dodati metodu dodajIgraca koja će kao ulazni argument primati objekat klase Igrac i koja će dodati novog igrača u niz igrača
Implementirati scenario
kreirati objekat klase Grad sa imenom Sakramento
napraviti objekat klase Klub koji se zove Kings, osnovan je 1951. i nalazi se u gradu Sakramento
kreirati nekoliko igraca klase Igrac, i dodati ih u klub Kings


Resenje zadatak 1

class Macka {
    public $ime;
    public $majka = 'mama';
    public $otac;

    public function __construct($ime, $majka = 'nepoznata', $otac = 'nepoznat') {
        $this->ime = $ime;
        $this->majka = $majka;
        $this->otac = $otac;
    }

    public function mjau() {
        echo $this->ime . ' kaze mjau';
    }
}

$cvrle = new Macka('Cvrle');
dump($cvrle);

$cvrle->mjau();

Resenje zadatak 2

class Pravougaonik
{
   private $a;
   private $b;
   private $d;

   public function __construct($a, $b)
   {
       $this->a = $a;
       $this->b = $b;
       $this->izracunajD();
   }

   private function izracunajD()
   {
       $this->d = sqrt($this->a * $this->a + $this->b * $this->b);
   }

   public function getA()
   {
       return $this->a;
   }

   public function getB()
   {
       return $this->b;
   }

   public function getD()
   {
       return $this->d;
   }

   public function setA($noviA)
   {
       $this->a = $noviA;
       $this->izracunajD();
   }

   public function setB($noviB)
   {
       $this->b = $noviB;
       $this->izracunajD();
   }

}

$pravougaonik = new Pravougaonik(4,3);

echo "Stranica A je " . $pravougaonik->getA() . ", stranica B je " . $pravougaonik->getB() . ", dijagonala je " . $pravougaonik->getD() . "<br/>";

$pravougaonik->setA(8);
$pravougaonik->setB(6);

echo "Stranica A je " . $pravougaonik->getA() . ", stranica B je " . $pravougaonik->getB() . ", dijagonala je " . $pravougaonik->getD() . "<br/>";

Resenje zadatak 3

class Racun {
    public $brojRacuna;
    private $banka;
    private $vlasnik;
    private $stanje;
 
    public function __construct($brojRacuna, $banka, $vlasnik, $stanje)
    {
        $this->brojRacuna = $brojRacuna;
        $this->banka = $banka;
        $this->vlasnik = $vlasnik;
        $this->stanje = $stanje;
    }
 }
 
 class Banka {
    public $ime;
    private $racuni = [];
 
    public function __construct($ime)
    {
        $this->ime = $ime;
    }
 
    public function dodajRacun($imeVlasnika, $pocetnoStanje, $brojRacuna)
    {
        $noviRacun = new Racun($brojRacuna, $this->ime, $imeVlasnika, $pocetnoStanje);
        $this->racuni[] = $noviRacun;
        return $noviRacun;
    }
 }
 
 $bankaIntesa = new Banka("Banka Intesa");
 $bankaIntesa->dodajRacun('Marko Markovic', 0, 11111);
 $bankaIntesa->dodajRacun('Dejan Dejanovic', 10, 22222);
 $bankaIntesa->dodajRacun('Milos Milosevic', 20, 33333);
 
 var_dump($bankaIntesa);
 
 Resenje zadatak 4
 
 class SimKartica {
    private $brojTelefona;
    private $mreza;
 
    public function __construct($brojTel)
    {
        $this->brojTelefona = $brojTel;
    }
 
    public function postaviMrezu($novaMreza)
    {
        $this->mreza = $novaMreza;
    }
 }

 
 class MobilnaMreza {
    public $ime;
    private $sveSimKartice = [];
 
    public function __construct($ime)
    {
        $this->ime = $ime;
    }
 
    public function novaSimKartica($brojTelefona)
    {
        $novaKartica = new SimKartica($brojTelefona);
        $novaKartica->postaviMrezu($this->ime);
 
        $this->sveSimKartice[] = $novaKartica;
        return $novaKartica;
    }
 }
 
 $mts = new MobilnaMreza('mts');
 $mts->novaSimKartica('0123456');
 $mts->novaSimKartica('0456789');
 
 var_dump($mts);
 
 REsenje zadatak 5
 
 class Grad {
    public $ime;
 
    public function __construct($ime)
    {
        $this->ime = $ime;
    }
 }
 
 class Igrac {
    public $ime;
    public $prezime;
    public $pozicija;
 
    public function __construct($ime, $prezime, $pozicija)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->pozicija = $pozicija;
    }
 }
 
 class Klub {
    public $ime;
    public $grad;
    public $datum_osnivanja;
    public $igraci = [];
 
    public function __construct($ime, $grad, $datum_osnivanja)
    {
        $this->ime = $ime;
        $this->grad = $grad;
        $this->datum_osnivanja = $datum_osnivanja;
    }
 
    public function dodajIgraca($noviIgrac)
    {
        $this->igraci[] = $noviIgrac;
    }
 }
 
 $sakremento = new Grad('Sakremento');
 $kings = new Klub('Kings', $sakremento, '1951');
 $bogdanBogdanovic = new Igrac('Bogdan', 'Bogdanovic', 'bek');
 $vinsKarter = new Igrac('Vins', 'Karter', 'krilo');
 
 $kings->dodajIgraca($bogdanBogdanovic);
 $kings->dodajIgraca($vinsKarter);
 
 dump($kings);
