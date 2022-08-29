<?php include_once('db.php');
if (isset($_POST['submit'])) {
    // var_dump($_POST);

    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    if (empty($title) || empty($category) || empty($content)) {
        echo ("Nisu svi podaci popunjeni");
    } else {
        $currentDate = date("Y-m-d h:i");
        $sql = "INSERT into ads (title,content,category,created_at,expires_on,user_id)
         values ('$title','$content','$category','$currentDate','2022-12-20',1)";
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
        <h1 class="c-p-title"> Novi oglas </h1>
        <form action="new_ad.php" method="POST" id="postsForma">
            <ul class="flex-outer">
                <li>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter title">
                </li>
                <li>
                    <label for="email">Content</label>
                    <textarea name="content" placeholder="Enter content" rows="10" id="bodyPosts"></textarea><br>
                </li>
                <li>
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" placeholder="Enter Category">
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