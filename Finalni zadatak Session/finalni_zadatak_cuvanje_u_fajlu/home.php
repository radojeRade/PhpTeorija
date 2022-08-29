<?php
// Ukoliko nam se errori ne prikazuju uopste, potrebno je otkomentarisati narednu liniju koda
// error_reporting(E_ALL);

session_start();

// Ako neko dodje na ovu stranicu kao neulogovani korisnik, odmah ga prebacujemo na stranicu za logovanje
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

// Ako je neko kliknuo na Logout dugme, bice postavljen query parametar 'action' sa vrednoscu 'logout' i u tom slucaju zelimo da izlogujemo korisnika
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    header('Location: login.php');
}

$filename = 'users.json';

if (file_exists($filename)) {
    $users = json_decode(file_get_contents($filename), true);
} else {
    file_put_contents($filename, json_encode([]));
    $users = [];
}

function getCurrentUserName(array $users)
{
    $currentUser = $_SESSION['user'];

    foreach ($users as $user) {
        if ($user['email'] === $currentUser['email']) {
            return $user['name'];
        }
    }

    return null;
}

function getAllUsersAsListItems(array $users)
{
    $usersString = "";

    foreach ($users as $user) {
        $name = $user['name'];
        $lastname = $user['lastname'];
        $usersString .= "<li>$name $lastname</li>";
    }

    return $usersString;
}

?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header-content">
            <h3>Welcome, <?php echo getCurrentUserName($users); ?></h3>
            <a class="btn btn-primary" href="home.php?action=logout">Logout</a>
        </div>
    </header>
    <section>
        <h1>List of all users</h1>
        <div class="list">
            <ul>
                <?php echo getAllUsersAsListItems($users); ?>
            </ul>
        </div>
    </section>
    <?php include('footer.php'); ?>
</body>

</html>