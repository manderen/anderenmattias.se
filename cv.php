<?php 
    // config file to connect warehouse
    require('includes/config.php'); 
    ?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0"/>
        
        <title>FRONTIER|KYH</title>
        <link rel="stylesheet" type="text/css" href="style/style.screenStyles.css" />
        <link rel="stylesheet" type="text/css" href="style/style.screenLayoutLarge.css" />
        <link rel="stylesheet" type="text/css" media="only screen and (min-width:401px) and (max-width:600px)"  
                href="css/screenLayoutMedium.css"/> 
        <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:400px)"  
                href="style/style.screenLayoutSmall.css"/>
       
        
    </head>
    <body>
        <div id="fb-root"></div>
        <div class="page">
            
            <header>
                <a class="logo" href="index.php"></a>   
            </header>

            <article>
                <h1>CV</h1>
                <hr/>
                <?php
                    try {

                        $stmt = $db->query('SELECT postID, postTitle, postContent FROM content ORDER BY postID DESC');
                        while($row = $stmt->fetch()){
                            
                            echo '<div>';
                                echo '<h1>'.$row['postTitle'].'</h1>';
                                echo '<p>'.$row['postContent'].'</p>';                              
                            echo '</div>';

                        }

                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                ?>
            </article>
            


            <!-- NAVBAR -->
            <nav>
                <a href="index.php">Startsida</a>
                <a href="cv.php">CV</a>  
                <a href="portfolio.php">Portfolio</a>

                <!--twitter plugin-->
                <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                <!--facebook plugin-->
                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Dela</a></div>
                <!--a href="facebook.com/mattias.anderen.5"><img src="../media/facebookIcon.png"</a>-->  
                <p>Dela på facebook eller twitter!</p>        
            </nav>

                <footer>
                    &copy;Mattias Anderén
                </footer>
        </div>
    
    </body>
     <script type="text/javascript" src="script/script.engine.js"></script>
</html>