<!--
By Antonio DelVecchio and Leo Keefe
-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="limbo_landing.css">
    <a href="limbo_admin.php">Back to Admin Page</a>
    <h1>Edit User Page</h1>
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

<?php
require( 'includes/limbo_login_tools.php' ) ;
require( 'includes/connect_db.php' ) ;
session_start();

#kicks user to login if they havent been validated    
if($_SESSION["authen"] == 1){
}else{ 
    load('limbo_login.php', -1);        
}
    
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {

    $user_id = "";
    $user_name = "";
    $first_name = "";
    $last_name = "";
    $email = "";
    $pass = "";
    $reg_date = "";
    $user_id2 = "";
    $user_name2 = "";
    $first_name2 = "";
    $last_name2 = "";
    $email2 = "";
    $pass2 = "";
    $reg_date2 = "";
    $user_id3 = "";

}
    
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
 
if (isset($_POST['user_id'])){
    $user_id = $_POST['user_id'] ;
    $user_name = $_POST['user_name'] ;
    $first_name = $_POST['first_name'] ;    
    $last_name = $_POST['last_name'] ;
    $email = $_POST['email'] ;
    $pass = $_POST['pass'] ;
    $reg_date = $_POST['reg_date'] ;
    update_user_record($dbc, $user_id, $user_name, $first_name, $last_name, $email, $pass, time());
}
if (isset($_POST['user_id2'])){
    $user_id2 = $_POST['user_id2'] ;
    $user_name2 = $_POST['user_name2'] ;
    $first_name2 = $_POST['first_name2'] ;    
    $last_name2 = $_POST['last_name2'] ;
    $email2 = $_POST['email2'] ;
    $pass2 = $_POST['pass2'] ;
    insert_user_record($dbc, $user_id2, $user_name2, $first_name2, $last_name2, $email2, $pass2);

if(isset($_POST[ 'user_id3' ])){
    $user_id3 = $_POST['user_id3'] ;
    delete_record_users($dbc, $user_id3);
}    
    
}
}

show_records_users($dbc);
mysqli_close( $dbc ) ;
    
?>
     
<table>
            
  
<form action="limbo_admin_users.php" method="POST">
   <table>
       <tr>
       <td></td><td>User ID</td>
        </tr>
        <tr>
            <td>Delete Entry</td><td><input type=text name='user_id3' size = "10" value = 
            "<?php if (isset($_POST['user_id3'])) echo $_POST['user_id3']; ?>"></td>
        </tr>
</table>
<table>
    <tr>
        <td></td><td>User ID</td><td>User Name</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Password</td><td>Date Created</td>
    </tr>
        <tr>
            <td>Update Data</td>
            <td>
            <input type="text" name="user_id" size="10" value = 
            "<?php if (isset($_POST['user_id'])) echo $_POST['user_id']; ?>">
            </td>
            <td>
            <input type="text" name="user_name" size="10"value = 
            "<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>">
            </td>
            <td>
            <input type="text" name="first_name" size="10"value = 
            "<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
            </td>    
            <td>
            <input type="text" name="last_name" size="10"value = 
            "<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
            </td>
            <td>
            <input type="text" name="email" size="10"value = 
            "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
            </td>
            <td>
            <input type="text" name="pass" size="10"value = 
            "<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>">
            </td>
            <td>
            <input type="text" name="reg_date" size="10"value = 
            "<?php if (isset($_POST['reg_date'])) echo $_POST['reg_date']; ?>">    
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td></td><td>User ID</td><td>User Name</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Password</td>
        </tr>
        <tr>
            <td>New Entry</td>
            <td>
            <input type="text" name="user_id2" size="10" value = 
            "<?php if (isset($_POST['user_id2'])) echo $_POST['user_id2']; ?>">
            </td>
            <td>
            <input type="text" name="user_name2" size="10"value = 
            "<?php if (isset($_POST['user_name2'])) echo $_POST['user_name2']; ?>">
            </td>
            <td>
            <input type="text" name="first_name2" size="10"value = 
            "<?php if (isset($_POST['first_name2'])) echo $_POST['first_name2']; ?>">
            </td>    
            <td>
            <input type="text" name="last_name2" size="10"value = 
            "<?php if (isset($_POST['last_name2'])) echo $_POST['last_name2']; ?>">
            </td>
            <td>
            <input type="text" name="email2" size="10"value = 
            "<?php if (isset($_POST['email2'])) echo $_POST['email2']; ?>">
            </td>
            <td>
            <input type="text" name="pass2" size="10"value = 
            "<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
            </td>
        </tr>
    </table>
    <p><input type="submit" ></p>
</form>         
</body>    
</html>