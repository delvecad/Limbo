<!--
By Antonio DelVecchio and Leo Keefe
-->
<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="limbo_landing.css">
</head>


<body>
    <div class = "frontPage">
        <h1>Found Item</h1>
        <!--navigation bar-->
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
        
        <h2>Please enter all of the relevant information into the fields below</h2>
        
    <?php
    # Connect to MySQL server and the database
    require( 'includes/connect_db.php' ) ;

    # Includes these helper functions
    require( 'includes/helpers.php' ) ;

    # If user opened the page without submitting, initialize the fields
    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
      $id = "" ;
      $location_id = "" ;
      $description = "" ;
      $create_date = "" ;
      $update_date = "" ;
      $room = "" ;
      $owner = "" ;
      $finder = "" ;
      #$status = "";
    }

    # Setting values upon submission    
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

        $location_id = $_POST['location_id'] ;
        $description = $_POST['description'] ;
        $room = $_POST['room'] ;
        #$owner = $_POST['owner'] ;
        $finder = $_POST['finder'] ;
        $status = 'found' ;

    # Initialize an error array.
      $errors = array();

        $location_id = $_POST['location_id'] ;
        $description = $_POST['description'] ;
        $room = $_POST['room'] ;
        #$owner = $_POST['owner'] ;
        $finder = $_POST['finder'] ;
        #$status = $_POST['status'] ;

    # Check for location_id and description

        if ( empty( $_POST[ 'location_id' ] ) ) {
            $errors[] = 'location_id' ;
        }
        else {
            $location_id = trim( $location_id )  ;
        }

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
        insert_record_found($dbc, $location_id, $description, $room, $finder, $status);
      } 
    } 

    # Close the connection
    mysqli_close( $dbc ) ;
    ?>

    <!-- Get inputs from the user. -->
    <form action="limbo_found.php" method="POST">
    <a href="limbo_update.php">Update Entry</a>
    <table>
        <tr>
            <td>Finder:</td><td><input type="text" name="finder" value = 
            "<?php if (isset($_POST['finder'])) echo $_POST['finder']; ?>"></td>
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
    </form>
    </div>
</body>    
</html>
