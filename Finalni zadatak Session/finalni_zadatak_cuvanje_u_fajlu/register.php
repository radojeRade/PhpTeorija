<?php
// Ukoliko nam se errori ne prikazuju uopste, potrebno je otkomentarisati narednu liniju koda
// error_reporting(E_ALL);

session_start();

// Ako neko dodje na ovu stranicu kao ulogovani korisnik, odmah ga prebacujemo na home stranicu
if (isset($_SESSION['user'])) {
    header('Location: home.php');
}

// Korisnike cuvamo u JSON fajlu, pa je potrebno da ih ili preuzmemo iz fajla ili kreiramo prazan fajl ukoliko on ne postoji

$filename = 'users.json';

if (file_exists($filename)) {
    $users = json_decode(file_get_contents($filename), true);
} else {
    file_put_contents($filename, json_encode([]));
    $users = [];
}

/**
 * Funkcija koja na osnovu datog parametra `email` pronalazi korisnika u listi svih korisnika koju cuvamo u sesiji.
 * @return bool Ukoliko je korisnik pronadjen povratna vrednost je `true`, a u suprotnom je `false`.
 */
function checkIfThereIsUserWithGivenEmail(string $email, array $users): bool
{
    return count(array_filter($users, function ($user) use ($email, $users) {
        return $user['email'] === $email;
    })) > 0;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (checkIfThereIsUserWithGivenEmail($_POST['email'], $users)) {
        // Korisnik ostaje na stranici za registraciju zato sto vec postoji neki korisnik sa tom email adresom i prikazuje mu se validaciona poruka
        $existingEmailErrorMessage = "User with entered email already exists!";
    } else {
        // Korisnik sa unetom email adresom ne postoji, pa ga mozemo dodati u listu postojecih korisnika koju cuvamo u sesiji
        array_push($users, $_POST);
        file_put_contents($filename, json_encode($users));

        // Registrovanog korisnika odmah zelimo da ulogujemo, dakle postavljamo njegove kredencijale u sesiju pod indeksom 'user'
        $_SESSION['user'] = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        // Preusmeravamo korisnika na home stranicu
        header('Location: home.php');
    }
}

?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('header.php'); ?>
    <section>
        <h1>Register</h1>
        <form action="register.php" method="post">
            <div class="form-fields">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <label for="lastname">Lastname:</label>
                    <label for="email">Email:</label>
                    <label for="password">Password:</label>
                </div>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your first name" required />
                    <input type="text" name="lastname" placeholder="Your last name" required />
                    <input type="email" name="email" placeholder="Your email address" required />
                    <input type="password" name="password" placeholder="Secret secret" required />
                </div>
            </div>
            <button class="btn btn-primary">Register</button>
        </form>
        <p class="error-message">
            <?php
            if (isset($existingEmailErrorMessage)) {
                echo $existingEmailErrorMessage;
            }
            ?>
        </p>
    </section>
    <?php include('footer.php'); ?>
</body>

</html>