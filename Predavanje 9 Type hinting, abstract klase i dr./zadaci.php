class Disk {
    public $ime;
    public $memorija;
    public $lista_foldera = [];
 
    public function __construct($ime, $memorija)
    {
        $this->ime = $ime;
        $this->memorija = $memorija;
    }
 
    public function dodajFolder(Folder $folder)
    {
        $this->lista_foldera[] = $folder;
    }
 }
 
 class Folder {
    public $ime;
    public $lista_fajlova = [];
 
    public function __construct($ime)
    {
        $this->ime = $ime;
    }
 
    public function dodajFajl(Fajl $fajl)
    {
        $this->lista_fajlova[] = $fajl;
    }
 }
 
 class Fajl {
    public $ime;
 
    public function __construct($ime)
    {
        $this->ime = $ime;
    }
 }
 
 class Video extends Fajl {
    public $format;
 
    public function __construct($ime, $format)
    {
        parent::__construct($ime);
        $this->format = $format;
    }
 }
 
 class Slika extends Fajl {
    public $sirina;
    public $visina;
 
    public function __construct($ime, $sirina, $visina)
    {
        parent::__construct($ime);
        $this->sirina = $sirina;
        $this->visina = $visina;
    }
 }
 
 class TekstualniFajl extends Fajl {
    public $duzinaTeksta;
 
    public function __construct($ime, $duzinaTeksta)
    {
        parent::__construct($ime);
        $this->duzinaTeksta = $duzinaTeksta;
    }
 }
 
 $cDisk = new Disk('c', 5000);
 
 $folderSlike = new Folder('Slike');
 $folderVideo = new Folder('Video');
 
 $cDisk->dodajFolder($folderSlike);
 $cDisk->dodajFolder($folderVideo);
 
 $slika1 = new Slika('Leto 2017', 800, 600);
 $slika2 = new Slika('Leto 2016', 800, 600);
 
 $folderSlike->dodajFajl($slika1);
 $folderSlike->dodajFajl($slika2);
 
 $video1 = new Video('Utakmica', 'mp4');
 $folderVideo->dodajFajl($video1);
 
 dump($cDisk);
 
 2. Zadatak:
class GeometrijskiObjekat {
    public $povrsina;
 
    public function __construct($povrsina)
    {
        $this->povrsina = $povrsina;
    }
 
    public function getPovrsina(): float
    {
        return $this->povrsina;
    }
 }
 
 class Objekat2D extends GeometrijskiObjekat {
    public $obim;
 
    public function __construct($povrsina, $obim)
    {
        parent::__construct($povrsina);
        $this->obim = $obim;
    }
 
    public function getObim(): float
    {
        return $this->obim;
    }
 }
 
 class Objekat3D extends GeometrijskiObjekat {
    public $zapremina;
 
    public function __construct($povrsina, $zapremina)
    {
        parent::__construct($povrsina);
        $this->zapremina = $zapremina;
    }
 
    public function getZapremina(): float
    {
        return $this->zapremina;
    }
 }
 
 class Pravougaonik extends Objekat2D {
    public $a;
    public $b;
 
    public function __construct($a, $b)
    {
        parent::__construct($a * $b, 2 * ($a+$b));
        $this->a = $a;
        $this->b = $b;
    }
 }
 
 class Kvadrat extends Pravougaonik {
    public function __construct($stranica)
    {
        parent::__construct($stranica, $stranica);
    }
 }
 
 class Krug extends Objekat2D {
    public $poluprecnik;
 
    public function __construct($poluprecnik)
    {
        $povrsina = $poluprecnik * $poluprecnik * 3.14;
        $obim = 2 * $poluprecnik * 3.14;
 
        parent::__construct($povrsina, $obim);
        $this->poluprecnik = $poluprecnik;
    }

 }
 
 class Lopta extends Objekat3D {
    public $poluprecnik;
 
    public function __construct($poluprecnik)
    {
        $povrsina = 4 * $poluprecnik * $poluprecnik * 3.14;
        $zapremina = (4 / 3) * $poluprecnik  * $poluprecnik * $poluprecnik * 3.14;
 
        parent::__construct($povrsina, $zapremina);
        $this->poluprecnik = $poluprecnik;
    }
 }
 
 class Kocka extends Objekat3D {
    public $stranica;
 
    public function __construct($stranica)
    {
        parent::__construct(
            6 * $stranica * $stranica,
            $stranica * $stranica * $stranica
        );
        $this->stranica = $stranica;
    }
 }
 
 $kv1 = new Kvadrat(5);
 echo "Povrsina kvadrata je: " . $kv1->getPovrsina() . "<br/>";
 echo "Obim kvadrata je: " . $kv1->getObim() . "<br/>";
 
 $pu1 = new Pravougaonik(4,5);
 echo "Povrsina pravougaonika je: " . $pu1->getPovrsina() . "<br/>";
 echo "Obim pravougaonika je: " . $pu1->getObim() . "<br/>";
 
 $kc1 = new Kocka(3);
 echo "Povrsina kocke je: " . $kc1->getPovrsina() . "<br/>";
 echo "Zapremina kocke je: " . $kc1->getZapremina() . "<br/>";

 


Jovana Radakovic  7:46 PM
abstract class Fajl {
    public $ime;
 
    public function __construct(string $ime)
    {
        $this->ime = $ime;
    }
 
    public abstract function getTip();
 }
 
 class Video extends Fajl {
    public $format;
    private static $brojac = 0;
 
    public function __construct(string $ime, string $format)
    {
        parent::__construct($ime);
        $this->format = $format;
    }
 
    public function getTip()
    {
        return 'video';
    }
 }
 
 class Slika extends Fajl {
    public $sirina;
    public $visina;
 
    public function __construct(string $ime, int $sirina, int $visina)
    {
        parent::__construct($ime);
        $this->sirina = $sirina;
        $this->visina = $visina;
    }
 
    public function getTip()
    {
        return 'slika';
    }
 }
 
 class TekstualniFajl extends Fajl {
    public $duzinaTeksta;
 
    public function __construct(string $ime, int $duzinaTeksta)
    {
        parent::__construct($ime);
        $this->duzinaTeksta = $duzinaTeksta;
    }
 
    public function getTip()
    {
        return 'tekst';
    }
 }


Jovana Radakovic  8:16 PM
interface Prenosivo {
    public function spakuj();
    public function prenesi($pozicija);
    public function raspakuj();
 }
 
 class Racunar implements Prenosivo {
 
    public function spakuj() {
        return "Racunar spakovan u kutiju <br/>";
    }
 
    public function prenesi($pozicija) {
        return "Racunar prenesen na poziciju $pozicija<br/>";
    }
 
    public function raspakuj() {
        return "Racunar raspakovan <br/>";
    }
 }
 
 class Krevet implements Prenosivo {
 
    public function spakuj() {
        return "Krevet rastavljen u delove <br/>";
    }
 
    public function prenesi($pozicija) {
        return "Delovi kreveta preneseni na poziciju $pozicija<br/>";
    }
 
    public function raspakuj() {
        return "Krevet sastavljen <br/>";
    }
 }
 
 $krevet = new Krevet();
 $racunar = new Racunar();
 
 echo $krevet->spakuj();
 echo $racunar->spakuj();
 
 echo $krevet->prenesi('Soba 23');
 echo $racunar->prenesi('Soba 23');
 
 echo $krevet->raspakuj();
 echo $racunar->raspakuj();
 
 Zadatak: Simulacija sistema zdravstvene ustanove
Karakteristike sistema zdravstvene ustanove su:
Doktor (ime, prezime, specijalnost) ima više pacijenata (ime, prezime, jmbg, broj zdravstvenog kartona).
Pacijent moze da ima samo jednog izabranog doktora.
Doktor može da zakaže laboratorijski pregled za pacijenta.
Svaki laboratorijski pregled ima datum i vreme kada je zakazan
Tipovi laboratorijskog pregleda su:
krvni pritisak (gornja vrednost, donja vrednost, puls)
nivo šećera u krvi (vrednost, vreme poslednjeg obroka)
nivo holesterola u krvi (vrednost, vreme poslednjeg obroka)
Napraviti simulacionu skriptu koja radi sledeće:
        1. kreirati doktora “Milan”
        2. kreirati pacijenta “Dragan”
        3. pacijent “Dragan” bira doktora “Milan” za svog izabranog lekara
        4. doktor “Milan” zakazuje pregled za merenje nivoa šećera u krvi za pacijenta “Dragan”
        5. doktor “Milan” zakazuje pregled za merenje krvnog pritiska za pacijenta “Dragan”
        6. pacijent “Dragan” obavlja laboratorijski pregled za merenje nivoa šećera u krvi. Simulirati i prikazati rezultate.
        7. pacijent “Dragan” obavlja laboratorijski pregled za merenje krvnog pritiska. Simulirati i prikazati rezultate.
Iz sledećeg koda se može zaključiti o klasama koje treba napisati (nisu pomenute sve potrebne klase):
8:33
$docMilan = new Doktor('Milan', 'Milanovic', 'kardiolog');
$pacDragan = new Pacijent('Dragan', 'Jovanovic', '023342323', '0005677');

$pacDragan->izaberiLekara($docMilan);

$pregled1 = new PregledNivoSecera('12-12-2017', '08:00', $pacDragan);
$docMilan->zakaziPregled($pregled1);
$pregled2 = new PregledKrvniPritisak('12-12-2017', '08:15', $pacDragan);
$docMilan->zakaziPregled($pregled2);

$pregled1->obaviPregled();
$pregled2->obaviPregled();
8:37
Implementirati klase tako da ovaj kod radi kao što je očekivano.
Ubaciti type hint u metode.
Postaviti apstraktne klase i metode na odgovarajuca mesta.


Resenje:
abstract class Osoba
{
   public $ime;
   public $prezime;

   public function __construct(string $ime, string $prezime)
   {
       $this->ime = $ime;
       $this->prezime = $prezime;
   }
}

class Doktor extends Osoba
{
   public $specijalnost;

   public function __construct(string $ime, string $prezime, string $specijalnost)
   {
       parent::__construct($ime, $prezime);
       $this->specijalnost = $specijalnost;
   }

   public function zakaziPregled(Pregled $pregled)
   {
       echo "Zakazan je pregled $pregled->tip za pacijenta {$pregled->pacijent->ime} {$pregled->pacijent->prezime} kod doktora $this->prezime <br/>";
   }
}

class Pacijent extends Osoba
{
   public $jmbg;
   public $brojKartona;
   public $doktor;

   public function __construct(string $ime, string $prezime, string $jmbg, string $brojKartona)
   {
       parent::__construct($ime, $prezime);
       $this->jmbg = $jmbg;
       $this->brojKartona = $brojKartona;
   }

   public function izaberiLekara(Doktor $doktor)
   {
       $this->doktor = $doktor;
   }
}

abstract class Pregled
{
   public $datum;
   public $vreme;
   public $pacijent;
   public $tip;

   public function __construct(string $datum, string $vreme, Pacijent $pacijent, string $tip)
   {
       $this->datum = $datum;
       $this->vreme = $vreme;
       $this->pacijent = $pacijent;
       $this->tip = $tip;
   }

   public abstract function obaviPregled();
}

class PregledKrvniPritisak extends Pregled
{
   public $gornjaVrednost;
   public $donjaVrednost;
   public $puls;

   public function __construct(string $datum, string $vreme, Pacijent $pacijent)
   {
       parent::__construct($datum, $vreme, $pacijent, 'krvni pritisak');
   }

   public function obaviPregled()
   {
       echo "Obavi pregled krvog pritiska za pacijenta {$this->pacijent->ime} {$this->pacijent->prezime} <br/>";

       $this->gornjaVrednost = 120;
       $this->donjaVrednost = 80;
       $this->puls = 60;

       echo "Rezultati pregleda: pritisak je {$this->gornjaVrednost}/{$this->donjaVrednost}, puls je $this->puls <br/>";

   }
}

class PregledNivoSecera extends Pregled
{
   public $vrednost;
   public $vremePoslednjegObroka;

   public function __construct(string $datum, string $vreme, Pacijent $pacijent)
   {
       parent::__construct($datum, $vreme, $pacijent, 'nivo secera');
   }

   public function obaviPregled()
   {
       echo "Obavi pregled nivoa secera u krvi za pacijenta {$this->pacijent->ime} {$this->pacijent->prezime} <br/>";

       $this->vrednost = 40;
       $this->vremePoslednjegObroka = '08:56';

       echo "Rezultati pregleda: vrednost $this->vrednost, vreme poslednjeg obroka $this->vremePoslednjegObroka <br/>";

   }
}

class PregledHolesterol extends Pregled
{
   public $vrednost;
   public $vremePoslednjegObroka;

   public function __construct(string $datum, string $vreme, Pacijent $pacijent)
   {
       parent::__construct($datum, $vreme, $pacijent, 'nivo holesterola');
   }

   public function obaviPregled()
   {
       echo "Obavi pregled holesterola za pacijenta {$this->pacijent->ime} {$this->pacijent->prezime} <br/>";

       $this->vrednost = 40;
       $this->vremePoslednjegObroka = '08:56';

       echo "Rezultati pregleda: vrednost $this->vrednost, vreme poslednjeg obroka $this->vremePoslednjegObroka <br/>";

   }
}


$docMilan = new Doktor('Milan', 'Milanovic', 'kardiolog');
$pacDragan = new Pacijent('Dragan', 'Jovanovic', '023342323', '0005677');

$pacDragan->izaberiLekara($docMilan);

$pregled1 = new PregledNivoSecera('12-12-2017', '08:00', $pacDragan);
$docMilan->zakaziPregled($pregled1);
$pregled2 = new PregledKrvniPritisak('12-12-2017', '08:15', $pacDragan);
$docMilan->zakaziPregled($pregled2);

$pregled1->obaviPregled();
$pregled2->obaviPregled();
9:54
(Nastavak na prethodni zadatak)
Napraviti klasu Loger, sa statickim metodama:
logujKreiranjeDoktora(Doktor $doktor)
logujKreiranjePacijenta(Pacijent $pacijent)
logujBiranjeLekara(Pacijent $pacijent, Doktor $doktor)
logujObavljanjePregleda(LaboratorijskiPregled $pregled)
Dodati logovanje akcija u sistemu (logovanje neka samo radi ispis). Akcije logovati u formatu [datum vreme] [akcija]. Primer jedne linije loga:
[20.03.2013 19:30] Pacijent “Milan” izvrsio je laboratorijski pregled nivoa holesterola u krvi.
Akcije koje treba da se loguju su:
kreiranje doktora
kreiranje pacijenta
pacijent bira doktora
obavljanje laboratorijskog pregleda
Datum se može dobiti pomoću:	(new DateTime())->format('d.m.Y H:i')
