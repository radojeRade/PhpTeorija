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
 * Funkcija koja na osnovu datih parametara `email` i `password` pronalazi korisnika u listi svih korisnika koju cuvamo u sesiji.
 * @return bool Ukoliko je korisnik pronadjen povratna vrednost je `true`, a u suprotnom je `false`.
 */
function checkIfCredentialsAreValid(string $email, string $password, array $users): bool
{
    return count(array_filter($users, function ($user) use ($email, $password) {
        return $user['email'] === $email && $user['password'] === $password;
    })) > 0;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (checkIfCredentialsAreValid($_POST['email'], $_POST['password'], $users)) {
        // Posto smo pronasli korisnika sa unetim kredencijalima, smestamo njega u sesiju kao ulogovanog korisnika pod indeksom 'user'
        $_SESSION['user'] = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        // Preusmeravamo korisnika na home stranicu
        header('Location: home.php');
    } else {
        // Korisnik ostaje na login stranici zato sto nije uneo validne kredencijale i prikazuje mu se validaciona poruka
        $loginErrorMessage = "Invalid credentials!";
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
        <h1>Login</h1>
        <form method="post" action="login.php">
            <div class="form-fields">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <label for="password">Password:</label>
                </div>
                <div class="form-group">
                    <input type="email" name="email" />
                    <input type="password" name="password" />
                </div>
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
        <p class="error-message">
            <?php
            if (isset($loginErrorMessage)) {
                echo $loginErrorMessage;
            }
            ?>
        </p>
    </section>
    <?php include('footer.php'); ?>
</body>

</html>