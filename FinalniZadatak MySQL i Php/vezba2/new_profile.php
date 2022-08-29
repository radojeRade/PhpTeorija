<?php include_once('db.php');

$id = $_GET["user_id"];


if (isset($_POST['submit'])) {
    // var_dump($_POST);
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $dateOfBirth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];


    if (empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($phone) || empty($city)) {
        echo ("Nisu svi podaci popunjeni");
    } else {
        $userFormId = $_POST['user_form_id'];
        $sql = "INSERT into profiles (first_name, last_name, date_of_birth, phone, city, user_id) values('$firstName','$lastName','$dateOfBirth','$phone','$city','$userFormId')";

        $statement = $connection->prepare($sql);
        $statement->execute();


        header("Location: ./index.php");
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
        <h1 class="c-p-title"> Novi profil</h1>
        <form action="new_profile.php" method="POST" id="postsForma">
            <ul class="flex-outer">
                <li>
                    <label for="first_name">Ime</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Unseite ime">
                </li>
                <li>
                    <label for="last_name">Prezime</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Unseite prezime">
                </li>
                <li>
                    <label for="date_of_birth">Datum rodjenja</label>
                    <input type="text" id="date_of_birth" name="date_of_birth" placeholder="Unseite datum rodjenja">
                </li>
                <li>
                    <label for="phone">Telefon</label>
                    <input type="text" id="phone" name="phone" placeholder="Unseite broj telefona">
                </li>
                <li>
                    <label for="city">Grad</label>
                    <input type="text" id="city" name="city" placeholder="Unseite grad">
                </li>

                <li>
                    <input hidden id="user_form_id" name="user_form_id" value="<?php echo $id ?>">

                    <button type="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>