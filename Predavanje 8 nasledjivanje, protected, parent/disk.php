<php>
class Disk {
    public $ime;
    public $memorija;
    public $lista_foldera = [];
 
    public function __construct($ime, $memorija)
    {
        $this->ime = $ime;
        $this->memorija = $memorija;
    }
 
 }
 
 class Folder {
    public $ime;
    public $lista_fajlova = [];
 
    public function __construct($ime)
    {
        $this->ime = $ime;
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
 
 
 $slika1 = new Slika('Leto 2017', 800, 600);
 $slika2 = new Slika('Leto 2016', 800, 600);
 
 
 $video1 = new Video('Utakmica', 'mp4');
 

 dump($cDisk);
 
 
 zadatak 2
 
 class Osoba {
    protected $ime, $prezime, $datumRodjenja;

    public function __construct($ime, $prezime, $datumRodjenja)
    {
    $this->ime = $ime;
    $this->prezime = $prezime;
    $this->datumRodjenja = $datumRodjenja;
    }
}

class Pacijent extends Osoba {
    private $izabraniDoktor, $recepti = [], $pregledi = [];

    public function __construct($ime, $prezime, $datumRodjenja)
    {
        parent::__construct($ime, $prezime, $datumRodjenja);
    }

    public function izaberiDoktora(Doktor $doktor)
    {
        $doktor->dodajPacijenta($this);
        $this->izabraniDoktor = $doktor;
    }

    public function dodajPregled(Pregled $pregled)
    {
        $this->pregledi[] = $pregled;
    }

    public function dodajRecept(Recept $recept)
    {
        $this->recepti[] = $recept;
    }
}

class Doktor extends Osoba {
    private $specijalizacija, $sestra, $pacijenti = [], $pregledi = [], $recepti = [];

    public function __construct($ime, $prezime, $datumRodjenja, $specijalizacija)
    {
        parent::__construct($ime, $prezime, $datumRodjenja);
        $this->specijalizacija = $specijalizacija;
    }

    public function dodajPacijenta(Pacijent $pacijent)
    {
        $this->pacijenti[] = $pacijent;
    }

    public function dodeliSestru(Sestra $sestra)
    {
        $sestra->dodajDoktora($this);
        $this->sestra = $sestra;
    }

    public function zakaziPregled(Pregled $pregled)
    {
        $this->pregledi[] = $pregled;
        $pregled->odrediVreme($this);
    }

    public function prepisiRecept(Pacijent $pacijent, $lek, $kolicina)
    {
        $noviRecept = new Recept($this, $pacijent, $lek, $kolicina);
        $this->recepti[] = $noviRecept;
        $pacijent->dodajRecept($noviRecept);
    }

}

class Sestra extends Osoba {
    private $doktor;

    public function __construct($ime, $prezime, $datumRodjenja)
    {
        parent::__construct($ime, $prezime, $datumRodjenja);
    }

    public function dodajDoktora(Doktor $doktor)
    {
        $this->doktor = $doktor;
    }
}

class Pregled {
    private $doktor, $ordinacija, $pacijent, $vreme;

    public function __construct(Pacijent $pacijent)
    {
        $this->pacijent = $pacijent;
        $pacijent->dodajPregled($this);
    }

    public function odrediVreme(Doktor $doktor)
    {
        $this->doktor = $doktor;
        $this->vreme = (new DateTime())->format('d.m.Y H:i');
    }

    public function odrediOrdinaciju(Ordinacija $ordinacija)
    {
        $this->ordinacija = $ordinacija;
        $ordinacija->dodajPregled($this);
    }

}

class Recept {
    private $pacijent, $doktor, $lek, $kolicina;

    public function __construct(Doktor $doktor, Pacijent $pacijent, $lek, $kolicina)
    {
        $this->doktor = $doktor;
        $this->pacijent = $pacijent;
        $this->lek = $lek;
        $this->kolicina = $kolicina;
    }
}
class Ordinacija {
    private $grad, $ime, $pregledi = [];

    public function __construct($grad, $ime)
    {
        $this->grad = $grad;
        $this->ime = $ime;
    }

    public function dodajPregled(Pregled $pregled)
    {
        $this->pregledi = $pregled;
    }
}

$ordinacija = new Ordinacija('Novi Sad', 'Poliklinika Boskovic');
$drMarkovic = new Doktor('Dragan',  'Markovic', 1965, 'kardiolog');
$olivera = new Sestra('Olivera', 'Popadic', 1977);
$drMarkovic->dodeliSestru($olivera);

$gosnZeljkovic = new Pacijent('Goran', 'Zeljkovic', 1960);
$gosnZeljkovic->izaberiDoktora($drMarkovic);

$ultrazvukSrca = new Pregled($gosnZeljkovic);
$drMarkovic->zakaziPregled($ultrazvukSrca);
$ultrazvukSrca->odrediOrdinaciju($ordinacija);

$drMarkovic->prepisiRecept($gosnZeljkovic, 'Cardiopirin', '3mg');


dump($ordinacija);
dump($drMarkovic);
dump($olivera);
dump($gosnZeljkovic);
dump($ultrazvukSrca);


Zadatak Geometrijski objekti:


class GeometrijskiObjekat {
    public $povrsina;
 
    public function __construct($povrsina)
    {
        $this->povrsina = $povrsina;
    }
 }
 
 class Objekat2D extends GeometrijskiObjekat {
    public $obim;
 
    public function __construct($povrsina, $obim)
    {
        parent::__construct($povrsina);
        $this->obim = $obim;
    }
 
 }
 
 class Objekat3D extends GeometrijskiObjekat {
    public $zapremina;
 
    public function __construct($povrsina, $zapremina)
    {
        parent::__construct($povrsina);
        $this->zapremina = $zapremina;
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
 $pu1 = new Pravougaonik(4,5);
 $kc1 = new Kocka(3);

 dump($kv1);
 dump($pu1);
 dump($kc1);

 </php>
