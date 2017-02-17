<!--
By Antonio DelVecchio and Leo Keefe
-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="limbo_landing.css">
</head> 
    
<body> 
    <div class ="frontPage">
        <h1> Claim Lost Item</h1>
        <!--navigation bar-->
            <ul>
             <li><a class = "home" href = "limbo_landing.php"> Home </a>
             </li>
             <li><a class = "landingLinks" href = "limbo_lost.php">Lost Items</a>
            </li>
            <li><a class = "landingLinks" href="limbo_found.php">Found an Item</a> 
            </li>
            <li><a class = "landingLinks" href="limbo_claim.php">Claim an Item</a>
            </li>
            <li><a class = "landingLinks" href="limbo_login.php">Admin Login</a>
            </li>    
        </ul>
        <?php
        require( 'includes/connect_db.php' ) ;
        require( 'includes/helpers.php' ) ;

        # If user opened the page without submitting, initialize the fields
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
          $id = "" ;
          $name = "" ;
        }

        # Setting values upon submission    
        if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

            $id = $_POST['id'] ;
            $name = $_POST['owner'] ;
            claim_record($dbc, $id, $name);

        }

        # Show the records
         if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
            if(isset($_GET['id']))
                show_link_record($dbc, $_GET['id']) ;
          }
        show_link_records_unclaimed($dbc);
         

        # Close the connection
        mysqli_close( $dbc ) ;
        ?>

        <!-- Get inputs from the user. -->
        <form action="limbo_claim.php" method="POST">
        <table>
            <tr>
                <td>ID:</td><td><input type="text" name="id" value = 
                "<?php if (isset($_POST['id'])) echo $_POST['id']; ?>"></td>
            </tr>
             <tr>
                <td>Name:</td><td><input type="text" name="owner" value = 
                "<?php if (isset($_POST['owner'])) echo $_POST['owner']; ?>"></td>
            </tr>
       
        <tr><td><input type="submit" ></td></tr>
        </form>
    </div>
</body>    
</html>
