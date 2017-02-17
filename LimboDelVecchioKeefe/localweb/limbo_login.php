<!--
This PHP script front-ends alphalimbo.php with a login page.
Originally created By Ron Coleman.
Adapted by: Antonio Delveccio, Leonardo Keefe
-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="limbo_landing.css">
</head>
<body>
    <div class = "frontPage">
        <?php
        # Connect to MySQL server and the database
        require( 'includes/limbo_login_tools.php' ) ;
        require( 'includes/connect_db.php' ) ; 
        session_start();


        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
            $user_name = "";
            $pass = "";
            
        }
        
        if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

            $user_name = $_POST['user_name'] ;
            $pass = $_POST['pass'] ;

            $pid = validate($user_name, $pass) ;

            if($pid == -1){
              echo '<P style=color:red>Login failed please try again.</P>' ;
            }else{
            echo '$pid';        
              $_SESSION["authen"] = 1;
              load('limbo_admin.php', $pid);
            }

        }
        ?>
        <!-- Get inputs from the user. -->
        <h1>Limbo Login</h1>
        
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
        
        <!--login fields-->
        <form action="limbo_login.php" method="POST">
        <table>
            <tr>
                <td>Username:</td><td><input type="text" name="user_name"></td>
            </tr>
            <tr>
                <td>Password:</td><td><input type = "password" name = "pass"></td>
            </tr>
        </table>
        <p><input type="submit" ></p>
        </form>
    </div>
</body>    
</html>