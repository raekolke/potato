<?

// This file opens a MySQL connection to the database you created in cPanel

// define database values
$databaseServer = "161.35.127.119"; // IP number of database, may be on the same server
$databaseName = "rkolkeco_potatoadventure"; // database name
$databaseUser = "rkolkeco_potatoaccess"; // user name
$databasePassword = "lP+mEYzip_xm";  // user password

$databaseTable = "question_table";  // main table name

/*
Available columns in this table:
- id [integer] — auto-incremented unique identifier
- situation [varchar(1000)] — the situation you are in 
- question [varchar(1000)] — the question presented with the situation
- 1option [varchar(200)] — first option 
- 2option [varchar(200)] — second option
- 3option [varchar(200)] — third option
- file_name [varchar(100)] — file name of graphic image that is presented with the situation
*/

// attempt DB connection and die() if it fails
$db = new mysqli($databaseServer, $databaseUser, $databasePassword, $databaseName);
if ($db->connect_error) die("Database connection failed: " . $db->connect_error);

/*

Now you can set strings of SQL and submit them like this:

$sql = "SELECT * FROM $databaseTable"; 
$result = $db->query($sql);
if (!$result) die("Error: " . $sql . "<br>" . $db->error);

*/