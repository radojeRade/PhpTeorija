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

function getCurrentUserName()
{
    $currentUser = $_SESSION['user'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $currentUser['email']) {
            return $user['name'];
        }
    }

    return null;
}

function getAllUsersAsListItems()
{
    $users = "";

    foreach ($_SESSION['users'] as $user) {
        $name = $user['name'];
        $lastname = $user['lastname'];
        $users .= "<li>$name $lastname</li>";
    }

    return $users;
}

?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header-content">
            <h3>Welcome, <?php echo getCurrentUserName(); ?></h3>
            <a class="btn btn-primary" href="home.php?action=logout">Logout</a>
        </div>
    </header>
    <section>
        <h1>List of all users</h1>
        <div class="list">
            <ul>
                <?php echo getAllUsersAsListItems(); ?>
            </ul>
        </div>
    </section>
    <?php include('footer.php'); ?>
</body>

</html>