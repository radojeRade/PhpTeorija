<?php 
    include_once('db.php');
    
    if (isset($_POST['register'])) {
        // var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(empty($email) || empty($password)) {
            echo("Nisu svi podaci popunjeni");
    
        } else {
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            $statement = $connection->prepare($sql);
            $statement->execute();

            header("Location: ./create_new_profile.php?username='$email'");
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
        <h1>Register</h1>
        <form action="create_new_user.php" method="post">
            <div class="form-fields">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <label for="password">Password:</label>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your email address" required />
                    <input type="password" name="password" placeholder="Secret secret" required />
                </div>
            </div>
            <button type="register" name="register">Register</button>
        </form>
        
    </section>
   
</body>