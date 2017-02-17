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
    <h1>Edit Stuff</h1>
        
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
require( 'includes/helpers.php' ) ;
require( 'includes/connect_db.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {

    $id = "";
    $location_id = "";
    $description = "";
    $create_date = "";
    $update_date = "";
    $room = "";
    $owner = "";
    $finder = "";
    $status = "";
}
    
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
 
if (isset($_POST['id'])){
    $id = $_POST['id'] ;
    $location = $_POST['location'] ;
    $create_date = $_POST['create_date'] ;    
    $update_date = $_POST['update_date'] ;
    $room = $_POST['room'] ;
    $owner = $_POST['owner'] ;
    $finder = $_POST['finder'] ;
    $status = $_POST['status'] ;    
    update_stuff_record($dbc, $id, $location, $create_date, $update_date, $create_date, $room , $owner, $finder, $status);
    }
}

show_link_records($dbc);
mysqli_close( $dbc ) ;
    
?>
      
<form action="limbo_update.php" method="POST">

<table>
    <tr>
        <td></td><td>ID</td><td>Location</td><td>Create Date</td><td>Update Date</td><td>Room</td><td>Owner</td><td>Finder</td><td>Status</td>
    </tr>
        <tr>
            <td>Update Data</td>
            <td>
            <input type="text" name="id" size="10" value = 
            "<?php if (isset($_POST['id'])) echo $_POST['id']; ?>">
            </td>
            <td>
            <input type="text" name="location" size="10"value = 
            "<?php if (isset($_POST['location'])) echo $_POST['location']; ?>">
            </td>
            <td>
            <input type="text" name="create_date" size="10"value = 
            "<?php if (isset($_POST['create_date'])) echo $_POST['create_date']; ?>">
            </td>    
            <td>
            <input type="text" name="update_date" size="10"value = 
            "<?php if (isset($_POST['update_date'])) echo $_POST['update_date']; ?>">
            </td>
            <td>
            <input type="text" name="room" size="10"value = 
            "<?php if (isset($_POST['room'])) echo $_POST['room']; ?>">
            </td>
            <td>
            <input type="text" name="owner" size="10"value = 
            "<?php if (isset($_POST['owner'])) echo $_POST['owner']; ?>">
            </td>
            <td>
            <input type="text" name="finder" size="10"value = 
            "<?php if (isset($_POST['finder'])) echo $_POST['finder']; ?>">    
            </td>
            <td>
            <input type="text" name="status" size="10"value = 
            "<?php if (isset($_POST['status'])) echo $_POST['status']; ?>">    
            </td>
        </tr>
    </table>
     <p><input type="submit" ></p>
</form>
</div>    
</body>    
</html>