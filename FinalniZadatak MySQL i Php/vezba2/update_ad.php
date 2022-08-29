<?php include_once('db.php');

$id = $_GET['post_id'];


if (isset($_POST['submit'])) {
    // var_dump($_POST);

    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $postId = $_POST['ad_id'];
    if (empty($title) || empty($category) || empty($content)) {
        echo ("Nisu svi podaci popunjeni");
    } else {
        $currentDate = date("Y-m-d h:i");


        $sql = "UPDATE ads set title = '$title', category = '$category', content = '$content' where id = '$postId'";


        $statement = $connection->prepare($sql);
        $statement->execute();
        header("Location: ./index.php");
    }
}


$sql_get_ad = "SELECT * from ads where id = '$id'";



$singlead = fetch($sql_get_ad, $connection);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivify Academy Online Oglasnik - update</title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="va-l-page va-l-page--homepage">

    <?php include('header.php') ?>

    <div class="form-wrapper">
        <h1 class="c-p-title"> Novi oglas </h1>
        <form action="update_ad.php" method="POST" id="postsForma">
            <ul class="flex-outer">
                <li>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $singlead['title'] ?>">
                </li>
                <li>
                    <label for="email">Content</label>
                    <textarea name="content" rows="10" id="content"><?php echo $singlead['content'] ?></textarea><br>
                </li>
                <li>
                    <label for="category">Category</label>
                   
                    <input type="text" name="category" id="category" value="<?php echo $singlead['category'] ?>">
                </li>
                    <input hidden id="ad_id" name="ad_id" value="<?php echo $id ?>">
                <li>
                    <button type="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>