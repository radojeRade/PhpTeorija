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
    //provera da li postoji user sa tim emailom
    $sql1 = "SELECT * FROM users";
    $users = fetch($sql1, $connection, true);
    $email = "markic@mail.com";
    function checkIfThereIsUserWithGivenEmail($users, $email)
{
    return count(array_filter($users, function ($user) use ($email) {
        return $user['email'] === $email;
    })) > 0;
}

?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class = "list">
            <ul>
                <?php 
                if(checkIfThereIsUserWithGivenEmail($users, $email)){
                    foreach ($users as $user) {
                        $name = $user['email'];
                        echo "<li>". $name . "</li>";
                    } 
                }?>
                </ul>
                
    </div>
    
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