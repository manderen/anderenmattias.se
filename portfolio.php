<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0"/>
        
        <title>FRONTIER|KYH</title>
        <link rel="stylesheet" type="text/css" href="style/style.screenStyles.css" />
        <link rel="stylesheet" type="text/css" href="style/style.screenLayoutLarge.css" />
        <link rel="stylesheet" type="text/css" media="only screen and (min-width:401px) and (max-width:600px)" href="style/style.screenLayoutMedium.css"/> 
        <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:400px)" href="style/style.screenLayoutSmall.css"/>
        <link rel="stylesheet" href="source/Bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="source/jQuery/jquery.ui.min.css" />
        <link rel="stylesheet" href="style/style.todo.css" />
        
        
    </head>
    <body class = "well">
        <div id="fb-root"></div>
        <div class="page">
            
            <header>
                <a class="logo" href="index.php"></a>   
            </header>

        <div id="container">


            <div id="header"> To Do List </div>
                <h2>Att göra lista</h2>
            <div class="task-list task-container" id="pending">
                <h3>Väntlista</h3>
            </div>

            <div class="task-list task-container" id="inProgress">
                <h3>Aktuella</h3>
            </div>

            <div class="task-list task-container" id="completed">
                <h3>Klara</h3>
            </div>

            <div class="task-list">
                <h3>Addera not</h3>
                <form id="todo-form">
                    <input type="text" placeholder="Titel" />
                    <textarea placeholder="Beskrivning"></textarea>
                    <input type="text" id="datepicker" placeholder="Datum" />
                    <input type="button" class="btn btn-primary" value="Addera" onclick="todo.add();" />
                </form>

                <input type="button" class="btn btn-primary" value="Radera" onclick="todo.clear();" />

                <div id="delete-div">
                    Drag Here to Delete
                </div>
            </div>

            <div style="clear:both;"></div>
              <script type="text/javascript" src="source/jQuery/jquery.min.js"></script>
            <script type="text/javascript" src="source/Bootstrap/bootstrap.min.js"></script>
            <script type="text/javascript" src="source/jQuery/jquery.ui.min.js"></script>
            <script type="text/javascript" src="script/script.todo.js"></script>

            <script type="text/javascript">
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker("option", "dateFormat", "dd/mm/yy");

                $(".task-container").droppable();
                $(".todo-task").draggable({ revert: "valid", revertDuration:200 });
                todo.init();
            </script>

        </div>
           

           <!-- NAVIGATE -->
            <nav>
                <a href="index.php">Startsida</a>
                <a href="cv.php">CV</a>  
                <a href="#">Portfolio</a>

                <!--twitter plugin-->
                <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                <!--facebook plugin-->
                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Dela</a></div> 
                <p>Dela sidan på facebook eller twitter!</p>        
            </nav>
                <footer>
                    &copy;Mattias Anderén
                </footer>
        </div>
    
    </body>
    <script type="text/javascript" src="script/script.engine.js"></script>
</html>