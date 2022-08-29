<?php 
    include_once('db.php');
    session_start();
   
    $id = $_GET['ad_id'];
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $postId = $_POST['id'];
        
        // if(empty($email) || empty($password)) {
        //     echo("Nisu svi podaci popunjeni");
    
        // } else {
        //     //$string = $_GET['id'];
            $sql = "UPDATE ads SET title = '$title', content = '$content', category = '$category'
                    WHERE id = '$postId'";
            $statement = $connection->prepare($sql);
            $statement->execute();

            header("Location: ./list_ads.php");
            echo ("Upisi u bazu");
        //}
    }
   
    $sql1 ="SELECT * FROM ads WHERE id = '$id'";
     $ad = fetch($sql1, $connection); 

?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <section>
        <h1>Update ad  <?php echo $id; ?></h1>
        <form action="update_ad.php" method="post">
            <div class="form-fields">
                <div class="form-group">
                    <label for="title">title:</label>
                    <label for="content">content:</label>
                    <label for="category">category:</label>  
                </div>
                <div class="form-group">
                    <input type="text" id = "title" name="title" value="<?php echo $ad['title'] ?>"/>
                    <input type="text" id = "content" name="content" value="<?php echo $ad['content'] ?>"/>
                    <input type="text" id = "category" name="category" value="<?php echo $ad['category'] ?>"/>
                    <input hidden id="id" name="id" value="<?php echo $id ?>">   
                </div>
            </div>
            <button type="update" name="update">Update ad</button>
        </form>
        
    </section>
   
</body>

