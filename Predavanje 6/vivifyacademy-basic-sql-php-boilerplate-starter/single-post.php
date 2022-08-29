<?php
    include_once('db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivify Academy Blog - Homepage</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="va-l-page va-l-page--single">

<?php include('header.php'); ?>

    <div class="va-l-container">
        <main class="va-l-page-content">

            <?php
                if (isset($_GET['post_id'])) {

                    // pripremamo upit
                    $sql = "SELECT * FROM posts AS p INNER JOIN users AS u ON u.id = p.user_id WHERE p.id = {$_GET['post_id']}";
                    $singlePost = fetch($sql, $connection, true);
                    // $statement = $connection->prepare($sql);
                    

                    // // izvrsavamo upit
                    // $statement->execute();
                    

                    // // zelimo da se rezultat vrati kao asocijativni niz.
                    // // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                    // $statement->setFetchMode(PDO::FETCH_ASSOC);
                    

                    // // punimo promenjivu sa rezultatom upita
                    // $singlePost = $statement->fetch();
                    
                    $sql2 ="SELECT * FROM comments AS c INNER JOIN users AS u ON u.id = c.user_id WHERE c.post_id = {$_GET['post_id']}";
                    $statement2 = $connection->prepare($sql2);
                    $statement2->execute();
                    $statement2->setFetchMode(PDO::FETCH_ASSOC);
                    $comments = $statement2->fetchAll();

                    $sql3 = "SELECT * FROM tags AS t INNER JOIN post_tag AS pt ON t.id = pt.tag_id WHERE pt.post_id = {$_GET['post_id']}";
                    $statement2 = $connection->prepare($sql3);
                    $statement2->execute();
                    $statement2->setFetchMode(PDO::FETCH_ASSOC);
                    $tags = $statement2->fetchAll();

                    // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                        // echo '<pre>';
                        // var_dump($tags);
                        // echo '</pre>';

            ?>
                
                    <article class="va-c-article">
                        <header>
                            <h1><?php echo $singlePost['title'] ?></h1>

                            <!-- zameniti privremenu kategoriju pravom kategorijom blog post-a iz baze -->
                            <h3>category: <strong><?php echo $singlePost['category'] ?></strong></h3>

                            <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
                            <div class="va-c-article__meta"><?php echo $singlePost['created_at'] ?> by <?php echo $singlePost['username'] ?></div>
                        </header>

                        <!-- zameniti ovaj privremeni (testni) text sa pravim sadrzajem blog post-a iz baze -->
                        <div>
                           
                            <p><?php echo $singlePost['body'] ?></p>
                        </div>

                        <footer>
                            <h3>tags:

                                <!-- zameniti testne tagove sa pravim tagovima blog post-a iz baze -->
                                <?php
                                    foreach ($tags as $tag) {
                                        echo "<a> " .$tag['name']. ", </a>";
                                    }
                                ?>    
                            </h3>
                        </footer>
                        <?php
                        foreach ($comments as $comment) {
                        ?>
                        <div class="comments">
                            <h3>comments</h3>

                            <!-- zameniti testne komentare sa pravim komentarima koji pripadaju blog post-u iz baze -->
                            <div class="single-comment">
                                <div>posted by: <strong><?php echo $comment['username'] ?></strong> on <?php echo $comment['created_at'] ?></div>
                                <div>Provident ut harum temporibus impedit odio quam amet accusamus ad quisquam velit
                                    incidunt praesentium cupiditate consectetur repellendus, fugiat quidem, officiis
                                    laudantium autem possimus ullam minima adipisci itaque? Eos, minus!
                                </div>
                            </div>
                            <!-- <div class="single-comment">
                                <div>posted by: <strong>Mitar Miric</strong> on 18.06.2017.</div>
                                <div>Incidunt praesentium cupiditate consectetur repellendus, fugiat quidem, officiis
                                    laudantium autem possimus ullam minima adipisci itaque? Eos, minus!
                                </div>
                            </div>
                            <div class="single-comment">
                                <div>posted by: <strong>Dule Savic</strong> on 20.06.2017.</div>
                                <div>Jedna je Crvena Zvezda!</div>
                            </div> -->
                        </div>
                        <?php }?>
                    </article>
            <?php
                } else {
                    echo('post_id nije prosledjen kroz $_GET');
                }
            ?>

        </main>
    </div>

    <?php include('footer.php'); ?>

</body>
</html>