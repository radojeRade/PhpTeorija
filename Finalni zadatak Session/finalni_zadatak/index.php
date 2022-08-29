<?php
// Ukoliko nam se errori ne prikazuju uopste, potrebno je otkomentarisati narednu liniju koda
// error_reporting(E_ALL);

session_start();

// Ako neko dodje na ovu stranicu kao ulogovani korisnik, odmah ga prebacujemo na home stranicu
if (isset($_SESSION['user'])) {
    header('Location: home.php');
}

// U slucaju kada se prvi put pristupi index stranici nemamo listu korisnika u sesiji, pa je potrebno da postavimo prazan niz u sesiju za index 'users'
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('header.php'); ?>

    <section>
        <h1>Welcome</h1>
    </section>

    <?php include('footer.php'); ?>
</body>

</html>