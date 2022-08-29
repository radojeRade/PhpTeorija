<?php 
    include_once('db.php');
    session_start();
    
    if (isset($_POST['register'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $created_at = $_POST['created_at'];
        $expires_on = $_POST['expires_on'];
        $userId = $_SESSION['user']['id'];

        
        // if(empty($email) || empty($password)) {
        //     echo("Nisu svi podaci popunjeni");
    
        // } else {
            //$string = $_GET['id'];
            $sql = "INSERT INTO ads (title, content, category, created_at, expires_on, user_id) 
                    VALUES ('$title', '$content', '$category', '$created_at', '$expires_on', '$userId')";
            $statement = $connection->prepare($sql);
            $statement->execute();

            header("Location: ./list_ads.php");
            echo ("Upisi u bazu");
        //}
    }

?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <section>
        <h1>Add new ad  <?php  $string = $_SESSION['user']['id']; echo ($string)?></h1>
        <form action="create_new_ad.php" method="post">
            <div class="form-fields">
                <div class="form-group">
                    <label for="title">title:</label>
                    <label for="content">content:</label>
                    <label for="category">category:</label>
                    <label for="created_at">created_at:</label>
                    <label for="expires_on">expires_on:</label>  
                </div>
                <div class="form-group">
                    <input type="title" name="title" placeholder=""/>
                    <input type="content" name="content" placeholder=""/>
                    <input type="category" name="category" placeholder=""/>
                    <input type="created_at" name="created_at" placeholder=""/>
                    <input type="expires_on" name="expires_on" placeholder=""/>   
                </div>
            </div>
            <button type="register" name="register">Add new ad</button>
        </form>
        
    </section>
   
</body>