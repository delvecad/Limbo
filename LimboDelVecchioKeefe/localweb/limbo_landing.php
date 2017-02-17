<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="limbo_landing.css">
</head>

<body> 
    <div class = "frontPage">
    <h1>Welcome to Limbo!</h1>
        
         <ul>
             <li><a class = "home" href = "limbo_landing.php"> Home </a>
             </li>
             <li><a class = "landingLinks" href = "limbo_lost.php">Lost Items</a></li>
            <li><a class = "landingLinks" href="limbo_found.php">Found an Item</a> 
            </li>
            <li><a class = "landingLinks" href="limbo_claim.php">Claim an Item</a>
            </li>
            <li><a class = "landingLinks" href="limbo_login.php">Admin Login</a>
            </li>    
        </ul>
        
    <h2> Lost something? Found Something? You're in luck. You found the right place to look!</h2>
        
 <?php

    require( 'includes/limbo_login_tools.php' ) ;
    require('includes/connect_db.php');

    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

        $direct = $_POST['user'] ;

            if($direct == 'finder')
                load('limbo_found.php', 0);
            else if($direct == 'owner')
                load('limbo_claim.php', 0);
            else if($direct == 'admin')
                load('limbo_login.php', 0);
    }
        
        # Show the records
        show_most_recent_records($dbc);
        echo 

        # Close the connection
        mysqli_close( $dbc ) ;

    ?>

    
    <img src = "includes/seal.jpg">    
    <!--<footer>
        Developed  by Antonio DelVecchio and Leo Keefe
    </footer>-->
    </div>
</body>
</html>    
  