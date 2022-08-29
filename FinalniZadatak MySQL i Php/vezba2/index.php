<?php include_once('db.php');
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

    <div class="va-l-container">
        <main class="va-l-page-content">

            <?php

            // pripremamo upit
            $sql = "SELECT ads.id, ads.title, ads.content, ads.category, ads.created_at, ads.expires_on, users.email from ads 
                inner join users on ads.user_id = users.id";

            //Izmesteno u funkciju u slucaju da se ne koristi otkomentarisati
            // $statement = $connection->prepare($sql);

            // // izvrsavamo upit
            // $statement->execute();

            // // zelimo da se rezultat vrati kao asocijativni niz.
            // // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
            // $statement->setFetchMode(PDO::FETCH_ASSOC);

            // // punimo promenjivu sa rezultatom upita
            // $posts = $statement->fetchAll();
            $oglasi = fetch($sql, $connection, true)
            // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
            // echo '<pre>';
            // var_dump($posts);
            // echo '</pre>';

            ?>

            <?php
            foreach ($oglasi as $oglas) {
            ?>

                <article class="va-c-article">
                    <header>
                        <h1><a href="update_ad.php?post_id=<?php echo ($oglas['id']) ?>"><?php echo ($oglas['title']) ?></a></h1>

                        <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
                        <div class="va-c-article__meta"><?php echo ($oglas['created_at']) ?> by <?php echo ($oglas['email']) ?></div>
                    </header>

                    <div>
                        <!-- zameniti ovaj privremeni (testni) text sa pravim sadrzajem blog post-a iz baze -->
                        <p><?php echo ($oglas['content']) ?></p>
                    </div>
                </article>

            <?php
            }
            ?>


            <div class="va-c-paginator">
                <a href="all-posts.php" title="All posts">All posts</a>
            </div>
        </main>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>