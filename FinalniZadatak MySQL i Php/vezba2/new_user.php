<?php include_once('db.php');
if (isset($_POST['submit'])) {
    // var_dump($_POST);

    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        echo ("Nisu svi podaci popunjeni");
    } else {
        $sql = "INSERT into users(email, password) values('$email', '$password');";

        $statement = $connection->prepare($sql);
        $statement->execute();

        $sql_get_user_id = "SELECT id from users where email = '$email'";
        $statement_get_user_id = $connection->prepare($sql_get_user_id);
        $statement_get_user_id->execute();
        $user_id = fetch($sql_get_user_id, $connection, false);
        header("Location: ./new_profile.php?user_id={$user_id['id']}");
        echo ("Upisi u bazu");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivify Academy Online Oglasnik - Homepage</title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="va-l-page va-l-page--homepage">

    <?php include('header.php') ?>

    <div class="form-wrapper">
        <h1 class="c-p-title"> Novi korisnik</h1>
        <form action="new_user.php" method="POST" id="postsForma">
            <ul class="flex-outer">
                <li>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter email">
                </li>
                <li>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" , placeholder="enter password"><br>
                </li>
                <li>
                    <button type="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>