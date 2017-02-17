<!--
This file contains logon functions for limbo DB
And has been Adapted by Antonio delveccio and Leo Keefe
-->
<?php
# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Loads a specified or default URL.
function load( $page, $pid){
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?id=' . $pid;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" ) ;

  exit() ;
}

# Validates the president name.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($user_name, $pass)
{
    global $dbc;
    if(empty($user_name) OR empty($pass))
      return -1 ;

    $shapass = sha1($pass); 
    
    # Make the query
    $query = "SELECT * FROM users WHERE users.user_name='" . $user_name . "' AND users.pass='" . $pass . "'" ;
    show_query($query) ;
    
    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the frist one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $pid = $row [ 'id' ] ;

    return intval($pid) ;
}
?>