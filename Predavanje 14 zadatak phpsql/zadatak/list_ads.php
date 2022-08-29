

<?php

                include_once('db.php');
                session_start();

                $sql = "SELECT p.id, p.title, p.content, p.category, p.created_at, p.expires_on, u.email, prof.first_name
                FROM ads as p 
                INNER JOIN users as u ON u.id = p.user_id
                INNER JOIN profiles as prof ON u.id = prof.user_id";


                
                $ads= fetch($sql, $connection, true)
                ?>
               <?php
                foreach ($ads as $ad) {
            ?>

                    <article class="va-c-article">
                        <header>
                            <h1><a href="update_ad.php?ad_id=<?php echo($ad['id']);?>"><?php echo($ad['title']); ?></a></h1>

                            <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
                            <div class="va-c-article__meta"><?php echo $ad['created_at']; ?> by <?php echo $ad['first_name']. "<br>"; ?></div>
                            <div class="va-c-article__meta"> <?php echo $ad['content']. "<br>"; ?></div>
                        </header>

                        
                    </article>

            <?php
                }
            

?>