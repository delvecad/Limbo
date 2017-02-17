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
        <h1> Limbo Admin </h1>

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
        
<!--display table-->
        <?php
    require( 'includes/connect_db.php' ) ;
    #require( 'includes/helpers.php' ) ;
    require( 'includes/limbo_login_tools.php' ) ;
    session_start();    
       
#kicks user to login if they havent been validated            
    if($_SESSION["authen"] == 1){
    }else{ 
        load('limbo_login.php', -1);
    }    
        
    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
    $id = "" ;
    $id2 = "";    
    $status = "";
    }

    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $id = $_POST['id'] ;
    $id2 = $_POST['id2'] ;
    $status = $_POST['status'] ;    

        if(isset($_POST[ 'id' ])){
            delete_record($dbc, $id);
        }
        if(isset($_POST[ 'id2' ])){
            claim_record($dbc, $id2, $status);
        }

    }

    # Show the records
    if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
        if(isset($_GET['id']) && $_GET['id'] != 0 )
        show_link_record($dbc, $_GET['id']) ;
    }    
    show_link_records_admin($dbc);
        mysqli_close( $dbc ) ;
    ?>

        <a href="limbo_admin_users.php" onclick="<?php session_start(); $_SESSION["authen"] = 1;?>">Edit User Data</a>
        <form action="limbo_admin.php" method="POST">
        <table>
            <tr>
                <td>Delete Entry:<input type=text name='id' value = 
                "<?php if (isset($_POST['id'])) echo $_POST['id']; ?>"> </td>
            </tr>

             <tr>
                <td>Change Status:<input type=text name='id2' value = 
                "<?php if (isset($_POST['id2'])) echo $_POST['id2']; ?>"> </td>
                <td>
                    <select name = "status">
                        <option value=""></option>
                        <option value="lost">Lost</option>
                        <option value="claimed">Claimed</option>
                        <option value="found">Found</option>
                    </select>  
            </tr>

        </table>
        <p><input type="submit" ></p>
        </form>
    </div>
</body>    
</html>
