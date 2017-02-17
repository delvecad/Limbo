/* This file shall hold all of the commands for our "Limbo" Database
Authors <Leonardo Keefe, Antonio Delveccio>
Version 1.0 */


/* create limbo db if it doesn't exist */
DROP DATABASE IF EXISTS limbo_db;
CREATE DATABASE IF NOT EXISTS limbo_db;

USE limbo_db 
/* create users table if it doesn't exist */
	DROP TABLE IF EXISTS users;
	CREATE TABLE IF NOT EXISTS users 
	(
		user_id INT NOT NULL AUTO_INCREMENT,
		user_name VARCHAR(60) NOT NULL,
		first_name VARCHAR(20) NOT NULL,
		last_name VARCHAR(40) NOT NULL,
		email VARCHAR(60) NOT NULL,
		pass CHAR(40) NOT NULL,
		reg_date DATETIME NOT NULL,
		PRIMARY KEY (user_id),
		UNIQUE(email),
		UNIQUE(user_name)
	);
/* populate user table with admin */
	INSERT INTO users (first_name, last_name, email, user_name, pass, reg_date)
		VALUES ("Leonardo", "Keefe","leonardo.keefe1@marist.edu","admin","gaze11e",Now());

/* create stuff table */
	DROP TABLE IF EXISTS stuff;
	CREATE TABLE IF NOT EXISTS stuff 
	(
		id INT NOT NULL AUTO_INCREMENT,
		location_id VARCHAR(40) NOT NULL,
		description TEXT NOT NULL,
		create_date DATETIME NOT NULL,
		update_date DATETIME NOT NULL,
		room TEXT,
		owner TEXT,
		finder TEXT,
		status SET("found","lost","claimed"),
		PRIMARY KEY(id),
		CONSTRAINT FOREIGN KEY(location_id) REFERENCES location(id)
	);
    
    INSERT INTO stuff (location_id, description, create_date, update_date, room, finder, status, owner, image)
        VALUES ("HC", "Black marist hoodie", '2015-11-22 16:00:01', '2015-11-22 16:00:01', 2020, "Joe Spagnuolo", "lost", "", ""),
                ("HC", "Red Starbucks Thermos", '2015-09-15 08:30:16', '2015-09-15 08:30:16', 3020, "Mark Mcpeck", "lost", "", ""),
                ("DN", "Black Nike Right Shoe", '2015-10-15 20:20:16', '2015-10-15 20:20:16', 112, "Jack Grekchowaik", "lost", "", "" ),
                ("LE", "3 Pairs of Shorts", '2015-11-20 10:27:18', '2015-11-20 10:30:00', 345, "Shane Brennan", "claimed", "Shane Brennan", ""),
                ("MC", "Marble Frog Sculpture", '2015-11-20 10:30:18', '2015-15-20 01:01:18', 345, "Kai Manners", "found", "Dr. Bayer", ""),
                ("FN", "Calvary Spurs", '2015-11-20 12:59:18', '2015-30-20 15:15:00', 111, "Dennis Murray", "claimed", "Colonel Sanders", "");




/*create locations table */
	DROP TABLE IF EXISTS location;
	CREATE TABLE IF NOT EXISTS location 
	(
		id INT NOT NULL AUTO_INCREMENT,
		create_date DATETIME NOT NULL,
		update_date DATETIME NOT NULL,
		name TEXT NOT NULL,
        location_id TEXT NOT NULL,
		PRIMARY KEY(id)
    );
/* populate locations table with buildings on campus */
	INSERT INTO location (create_date,update_date,name)
		VALUES(Now(),Now(), "Tenney Stadium", "AS"),
			(Now(),Now(), "Benoit House", "BE"),
			(Now(),Now(), "Boat House", "BH"),
			(Now(),Now(), "Byrne House", "BY"),
			(Now(),Now(), "Champagnat", "CH"),
			(Now(),Now(), "Donnelly", "DN"),
			(Now(),Now(), "Dyson", "DY"),
			(Now(),Now(), "Fontaine", "FN"),
			(Now(),Now(), "Upper Fulton", "UF"),
			(Now(),Now(), "Lower Fulton", "LF"),
			(Now(),Now(), "Gartland", "GA"),
			(Now(),Now(), "Gate House", "GH"),
			(Now(),Now(), "Gregory House", "GR"),
			(Now(),Now(), "Goshen", "GO"),
			(Now(),Now(), "Greystone", "GS"),
			(Now(),Now(), "Hancock", "HC"),
			(Now(),Now(), "Kirk House", "KH"),
			(Now(),Now(), "Library", "LB"),
			(Now(),Now(), "Leo", "LE"),
			(Now(),Now(), "Lowell Thomas", "LT"),
			(Now(),Now(), "Lower West Cedar", "LW"),
			(Now(),Now(), "Upper West Cedar", "UW"),
			(Now(),Now(), "Marian Hall", "MA"),
			(Now(),Now(), "McCann", "MC"),
			(Now(),Now(), "Midrise", "MR"),
			(Now(),Now(), "Mechanical Services", "MS"),
			(Now(),Now(), "Rotunda", "RO"),
			(Now(),Now(), "St. Ann's", "SA"),
			(Now(),Now(), "Student Center", "SC"),
			(Now(),Now(), "Sheahan", "SH"),
			(Now(),Now(), "St. Peter", "SP"),
			(Now(),Now(), "Steel Plant", "ST"),
			(Now(),Now(), "Off Campus", "OC");
			
			
