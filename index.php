<!-- <script type = "text/javascript">
        alert("hacked");
        </script> -->

<!DOCTYPE html>
<html>
    <head>
        <!-- encoding character -->
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">

        <!--scale align with  screen-->
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0"/>
        
        <title>FRONTIER|KYH</title>
        <!--base layer-->
        <link rel="stylesheet" type="text/css" href="style/style.screenStyles.css" /> 
         <!--large layer-->
        <link rel="stylesheet" type="text/css" href="style/style.screenLayoutLarge.css" />
        <!--middle layer-->
        <link rel="stylesheet" type="text/css" media="only screen and (min-width:401px) and (max-width:600px)" href="style/style.screenLayoutMedium.css"/> 
        <!--small layer-->
        <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:400px)" href="style/style.screenLayoutSmall.css"/>

        
    </head>
    
    <body>
   
    <!--facebook plug in-->
    <div id="fb-root"></div>

   

        <div class="page">
            
            <header>
                <a class="logo" href="#"></a>   
            </header>
            
            <article>
                <h1>Frontend utvecklare</h1>
                <p>
                     Här kan du följa min profil och framsteg som frontendutvecklare på KYH.
                </p>
            </article>

        <div class = "promoContainer">
    
            <div id = "promo one">
                <div class="content">
                    <h3>Tid kvar till LIA</h3>
                    <p id="LIA"></p> 
                </div>
            </div>

            <div id="promo two">
                <div class="content">                        
                    <h3>Examen</h3>
                    <p id="exam"></p>
                    <!-- youtube plugin -->
                    <iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="640" height="390" src="http://www.youtube.com/embed/C4r9NLpyCQc"
frameborder="0" allowFullScreen></iframe>
                </div>
            </div>
            
        </div>

        <div id="promo three">
            <div class="content">
                <h3>Kontakt</h3>
                <form action="savecomment.php" method="post" name="contact">
                    Namn:<br />
                        <input name="name" required type="text" class="ed" />
                        <br />
                      Epost:<br />
                      <input name="email" required type="text" class="ed" />
                      <br />
                      Meddelande:<br />
                      <textarea name="message" required rows="5" cols="23" class="ed"></textarea>
                      <br />
                      <input name="submit" type="submit" value="Skicka"/>
                   </div>
                  </form>
            
        <nav>
            <a href="/index.php">Startsida</a>
            <a href="/cv.php">CV</a>  
            <a href="/portfolio.php">Portfolio</a>

                
            <!--twitter plugin-->
            <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

            <!--facebook plugin-->
            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Dela</a></div>
            
            <p>Dela på twitter eller facebook!</p>            
        </nav>
                <footer>
                    &copy;Mattias Anderén
                    <a href="../admin">Admin</a>
                </footer>
        </div>

    </body>
    <script type="text/javascript" src="js/engine.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="source/konami.js"></script>
    <script type="text/javascript">
        $.konami(function(){
            window.open("source/hangman.php");
        });
    </script>
     <script>
    //function call 
    setTimer('01/15/2018 08:0 AM', 'LIA');      //LIA: 15/1-2018 
    setTimer('05/31/2018 08:0 AM', 'exam');     //Examen: 31/5-2018

    function setTimer(datum, id)
    {
        var endDate = new Date(datum);          //enddate
        var hourSet = 1000*60*60;
        var dayMS = hourSet*24;               //dayvalue in ms
        var timer;

        function showResult() {
            var nowDate = new Date();           //today date
            var distance = endDate - nowDate;
            if (distance < 0) {
                clearInterval(timer);
                document.getElementById(id).innerHTML = 'Utgått!';
                return;
            }
            var days = Math.floor(distance / dayMS); //return days left
            var hours = Math.floor((distance%dayMS) / hourSet);
            document.getElementById(id).innerHTML = days + ' dagar, ';
            document.getElementById(id).innerHTML += hours + ' timmar';
        }

        timer = setInterval(showResult, 1000); //timer update
    }
    </script>
</html>