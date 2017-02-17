
<?php
$debug = true;

# Shows the records

#shows link records
function show_link_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H2>Stuff</H2>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Locaton ID</TH>';
        echo '<TH>Description</TH>';
        echo '<TH>Create Date</TH>';
        echo '<TH>Update Date</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>'; 
        echo'<TH>Status</TH>'; 
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        $alink = '<A HREF=limbo_found.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        #echo '<TD>' . $row['id'] . '</TD>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        echo '<TD>' . $row['create_date'] . '</TD>' ;
        echo '<TD>' . $row['update_date'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['owner'] . '</TD>' ;
        echo '<TD>' . $row['finder'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;    
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#shows records that have no owner value 
function show_link_records_unclaimed($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff WHERE owner = ""' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H2>Stuff</H2>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Locaton ID</TH>';
        echo '<TH>Description</TH>';
        #echo '<TH>Create Date</TH>';
        #echo '<TH>Update Date</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>'; 
        echo'<TH>Status</TH>'; 
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        $alink = '<A HREF=limbo_claim.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        #echo '<TD>' . $row['id'] . '</TD>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        #echo '<TD>' . $row['create_date'] . '</TD>' ;
        #echo '<TD>' . $row['update_date'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['owner'] . '</TD>' ;
        echo '<TD>' . $row['finder'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;    
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#shows all items with lost status
function show_link_records_lost($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff WHERE status = "lost"' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H2>Stuff</H2>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Description</TH>';
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        $alink = '<A HREF=limbo_lost.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#shows link records with redirect to admin page
function show_link_records_admin($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H2>Stuff</H2>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Locaton ID</TH>';
        echo '<TH>Description</TH>';
        #echo '<TH>Create Date</TH>';
        #echo '<TH>Update Date</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>'; 
        echo'<TH>Status</TH>'; 
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        $alink = '<A HREF=limbo_admin.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        #echo '<TD>' . $row['id'] . '</TD>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;            
        echo '<TD>' . $row['description'] . '</TD>' ;
        #echo '<TD>' . $row['create_date'] . '</TD>' ;
        #echo '<TD>' . $row['update_date'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['owner'] . '</TD>' ;
        echo '<TD>' . $row['finder'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;    
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#show 5 latest found things
function show_most_recent_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff WHERE id = (SELECT MAX(id) FROM stuff) OR id = (SELECT MAX(id) - 1 FROM stuff) OR id = (SELECT MAX(id) - 2 FROM stuff) OR id = (SELECT MAX(id) - 3 FROM stuff)  OR id = (SELECT MAX(id) - 4 FROM stuff)'  ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H2>Stuff</H2>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>Locaton ID</TH>';
        echo '<TH>Description</TH>';
        echo '<TH>Room</TH>';
        echo'<TH>Status</TH>'; 
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        echo '<TR>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;    
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#show individual record from show_link_records above.
function show_link_record($dbc, $id) {

    $query = 'SELECT * FROM stuff WHERE id = ' . $id ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
        # echo '<H1>Stuff</H1>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Locaton Name</TH>';
        echo '<TH>Description</TH>';
        echo '<TH>Create Date</TH>';
        echo '<TH>Update Date</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>'; 
        echo'<TH>Status</TH>'; 
        echo'<TH>Image</TH>';
        echo '</TR>';
      
  		# For selected row, generate table
        if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        echo '<TR>' ;
        echo '<TD>' . $row['id'] . '</TD>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        echo '<TD>' . $row['create_date'] . '</TD>' ;
        echo '<TD>' . $row['update_date'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['owner'] . '</TD>' ;
        echo '<TD>' . $row['finder'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;
        echo '<TD>' . $row['image'] . '</TD>' ;
        echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Inserts a record into the stuff table
function insert_record_found($dbc, $location_id, $description, $room, $finder, $status) {
	
$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, status) 
VALUES ("' . $location_id . '" , "' . $description . '" , NOW() , NOW() , "' . $room . '" , "" , "' . $finder . '" , "' . $status . '")' ;
           
  #show_query($query);
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  return $results ;
}

function insert_record_lost($dbc, $location_id, $description, $room, $owner, $status) {
	
$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, status) 
VALUES ("' . $location_id . '" , "' . $description . '" , NOW() , NOW() , "' . $room . '" , "' . $owner . '" , "" , "' . $status . '")' ;
           
  #show_query($query);
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  return $results ;
}

#change record status on owner page
function claim_record($dbc, $id, $name){
    $query = 'UPDATE stuff SET status = "claimed", update_date = NOW(), owner = "' . $name .'" WHERE id = "'  . $id . '"';

    show_query($query);
    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;
    return $results ; 
    
}

#deletes specified record from table
function delete_record($dbc, $id){

$query = 'DELETE FROM stuff  WHERE id = "' . $id . '"';
    show_query($query);
    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;
    return $results ;   
    
}

#delete row from users
function delete_record_users($dbc, $id){

$query = 'DELETE FROM users  WHERE user_id = "' . $id . '"';
    show_query($query);
    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;
    return $results ;   
    
}
# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}

#create and populate user table
function show_records_users($dbc) {
	$query = 'SELECT * FROM users' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H2>Users</H2>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>User ID</TH>';
        echo '<TH>User Name</TH>';
        echo '<TH>First Name</TH>';
        echo '<TH>Last Name</TH>';
        echo '<TH>Email</TH>';
        echo '<TH>Password</TH>';
        echo '<TH>Last Updated</TH>';
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        echo '<TR>' ;
        echo '<TD>' . $row['user_id'] . '</TD>' ;
        echo '<TD>' . $row['user_name'] . '</TD>' ;
        echo '<TD>' . $row['first_name'] . '</TD>' ;
        echo '<TD>' . $row['last_name'] . '</TD>' ;
        echo '<TD>' . $row['email'] . '</TD>' ;
        echo '<TD>' . $row['pass'] . '</TD>' ;
        echo '<TD>' . $row['reg_date'] . '</TD>' ;
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#updates user record
function update_user_record($dbc, $user_id, $user_name, $first_name, $last_name, $email, $pass, $reg_date){
    #copy of table before update
    $validate_query = 'SELECT * FROM users WHERE user_id = "' . $user_id . '"';
    
    
    $results2 = mysqli_query($dbc,$validate_query) ;
    #if empty save old values
    while ( $row = mysqli_fetch_array( $results2 , MYSQLI_ASSOC ) ){
    if($user_name == ""){$user_name = $row['user_name'];}
    if(empty($first_name)){$first_name = $row['first_name'];}
    if(empty($last_name)){$last_name = $row['last_name'];}
    if(empty($email)){$email = $row['email'];}
    if(empty($pass)){$pass = $row['pass'];}
    if(empty($reg_date)){$reg_date = $row['reg_date'];}
    }
#update all values but unset values are the same    
$query = 'UPDATE users SET user_name = "' . $user_name . '", first_name = "' . $first_name . '", last_name = "' . $last_name . '", email = "' . $email . '", pass = "' . $pass . '", reg_date = "' . $reg_date . '" WHERE user_id = "' . $user_id . '"';
    #show_query($query);
    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;

    return $results ;     
        
}

#updates stuff
function update_stuff_record($dbc, $id, $location_id, $description, $create_date, $update_date, $room, $owner, $finder, $status){
       #copy of table before update
    $validate_query = 'SELECT * FROM stuff WHERE id = "' . $id . '"';
    
    
    $results2 = mysqli_query($dbc,$validate_query) ;
        #if empty save old values
    while ( $row = mysqli_fetch_array( $results2 , MYSQLI_ASSOC ) ){
    if(empty($location_id)){$location_id = $row['location_id'];}
    if(empty($description)){$description = $row['description'];}
    if(empty($create_date)){$create_date = $row['create_date'];}
    if(empty($update_date)){$update_date = $row['update_date'];}
    if(empty($room)){$room = $row['room'];}
    if(empty($owner)){$owner = $row['owner'];}
    if(empty($finder)){$finder = $row['finder'];}
    if(empty($status)){$status = $row['status'];}    
    }
 #update all values but unset values are the same       
$query = 'UPDATE stuff SET location_id = "' . $location_id . '", description = "' . $description . '", create_date = "' . $create_date . '", update_date = Now(), room = "' . $room . '", owner = "' . $owner . '" , finder = "' . $finder . '" , status = "' . $status . '" WHERE id = "' . $id . '"';
    #show_query($query);
    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;

    return $results ;     
        
}

#inserts user record
function insert_user_record($dbc, $user_id, $user_name, $first_name, $last_name, $email, $pass){
$query = 'INSERT INTO users(user_id, user_name, first_name, last_name, email, pass, reg_date)
 VALUES ("' . $user_id . '" , "' . $user_name . '", "' . $first_name . '", "' . $last_name . '", "' . $email . '", "' . $pass . '" , NOW())' ;

    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;

    return $results ;  
}

/*
# Checks if number is valid
function valid_number ($number) {
  if(empty($number) || !is_numeric($number))
    return false ;
   else {
    $number = intval($number);
    if($number <= 0 || $number >= 45)
      return false;
    }
    return true;
 } 

# Checks if name is valid
function valid_name($name) {
  if(empty($name)) 
    return false;
   else
    return true;
}

function validate_insert($dbc, $number, $fname, $lname){
  if(!valid_number($number))
    echo "<p style='color:red;font-size:16px;'>Please give a valid number!!!</p>"; 
  if (!valid_name($fname))
    echo "<p style='color:red;font-size:16px;'>Please complete the first name!!!</p>";
  if (!valid_name($lname))
    echo "<p style='color:red;font-size:16px;'>Please complete the last name!!!</p>";
  else
    insert_record($dbc,$number,$fname,$lname) ;
}
*/
?> 
