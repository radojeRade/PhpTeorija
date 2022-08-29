<?php 
    include_once('db.php');
    session_start();
    
    if (isset($_POST['register'])) {
        // var_dump($_POST);
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $dateOfBirth = $_POST['date_of_birth'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        
        if(empty($firstName) || empty($lastName) || empty($phone) || empty($city)) {
            echo("Nisu svi podaci popunjeni");
    
        } else {
            $string = $_GET['username'];
            $sql1 = "SELECT * FROM users WHERE email = $string";
            $statement = $connection->prepare($sql1);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $id = $statement->fetch();
            $stringId = $id['id'];

            $sql = "INSERT INTO profiles (first_name, last_name, date_of_birth, phone, city, user_id) 
                    VALUES ('$firstName', '$lastName', '$dateOfBirth', '$phone', '$city', '$stringId')";
            $statement = $connection->prepare($sql);
            $statement->execute();
            //ovde ubacen ceo user u sesiju pa startujem jos jednu sesiju kod create_new_ad 
            $_SESSION['user'] = [
                'id'=> $stringId,
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
            header("Location: ./create_new_ad.php");
            echo ("Upisi u bazu");
        }
    }

?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <section>
        <h1>Register  <?php  $string = $_GET['username']; echo ($string);?></h1>
        <form action="create_new_profile.php?username=<?php echo $_GET['username'] ?>" method="post">
            <div class="form-fields">
                <div class="form-group">
                    <label for="first_name">First name:</label>
                    <label for="last_name">Last name:</label>
                    <label for="date_of_birth">Date of birth:</label>
                    <label for="phone">phone:</label>
                    <label for="city">City:</label>
                </div>
                <div class="form-group">
                    <input type="first_name" name="first_name" placeholder="Your name" />
                    <input type="last_name" name="last_name" placeholder="Your last name" />
                    <input type="date_of_birth" name="date_of_birth" placeholder="Your birthday" />
                    <input type="phone" name="phone" placeholder="Your phone" />
                    <input type="city" name="city" placeholder="Your city" />
                </div>
            </div>
            <button type="register" name="register">Register</button>
        </form>
        
    </section>
   
</body>