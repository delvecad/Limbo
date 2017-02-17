<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" type="text/css" href="limbo_landing.css">
</head>
<body>
     <div class = "frontPage">
        <h1>Lost Items</h1> 
         
         <!-- navigation bar-->
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
         
        <!--describes list
        <h2> Items: </h2>--> 
         
        <!--list of lost items-->
          <?php

    require( 'includes/limbo_login_tools.php' ) ;
    require('includes/connect_db.php');
         
         
    if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
    $location_id = "";
    $description = "";
    $room = "";
    $owner = "";
    $status = "";    
    }

    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        
        $location_id = $_POST['location_id'] ;
        $description = $_POST['description'] ;
        $room = $_POST['room'] ;
        $owner = $_POST['owner'] ;
        #$finder = $_POST['finder'] ;
        $status = 'lost' ;

    # Initialize an error array.
      $errors = array();

        $location_id = $_POST['location_id'] ;
        $description = $_POST['description'] ;
        $room = $_POST['room'] ;
        $owner = $_POST['owner'] ;
        #finder = $_POST['finder'] ;
        #$status = $_POST['status'] ;

    # Check for location_id and description
        if ( empty( $_POST[ 'description' ] ) ) {
            $errors[] = 'description' ;
        }
        else {
            $description = trim( $description )  ;
        }

    # Report result and add to table
      if( !empty( $errors ) )
      {
        echo 'Error! Please enter your  ' ;
        foreach ( $errors as $field ) { echo " - $field " ; }
      }
      else {
        echo "<p>Success!</p>" ;
        insert_record_lost($dbc, $location_id, $description, $room, $owner, $status);
      } 
    } 
        
        # Show the records
         if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
            if(isset($_GET['id']))
                show_link_record($dbc, $_GET['id']) ;
          }         
       
        show_link_records_lost($dbc); 

        # Close the connection
        mysqli_close( $dbc ) ;

    ?>
         
    <form action="limbo_lost.php" method="POST">
    <a href="limbo_update.php">Update Entry</a>
    <table>
        <tr>
            <td>Your Name:</td><td><input type="text" name="owner" value = 
            "<?php if (isset($_POST['owner'])) echo $_POST['owner']; ?>"></td>
        </tr>
        <tr>
            <td>Location ID:</td><td><input type="text" name="location_id" value = 
            "<?php if (isset($_POST['location_id'])) echo $_POST['location_id']; ?>"></td>
        </tr>
        <tr>
            <td>Room:</td><td><input type="text" name="room" value = 
            "<?php if (isset($_POST['room'])) echo $_POST['room']; ?>"></td>
        </tr>
        <tr>
            <td>Description:</td><td><input type="text"  name="description" value = 
            "<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></textarea></td>
        </tr>
    </table>  
    <p><input type="submit" ></p>
    </div>
    </form>
</body>
</html>