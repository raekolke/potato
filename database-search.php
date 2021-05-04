<?

// This page offers a form that submits back to itself to search for records in the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';

// get search value from the submitted POST array
$search = $_POST["searchText"];

if ($search != "") {

	// select all columns (*) in rows where the $search appears in 
	// patient_name OR patient_complaint OR physician_name
	$sql = "SELECT * FROM $databaseTable
					WHERE patient_name LIKE '%$search%'
					OR patient_complaint LIKE '%$search%' 
					OR physician_name LIKE '%$search%'
					ORDER BY appt"; 
	$result = $db->query($sql);
	if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

	echo outputApptResults($result); // call the function that outputs a table
	
}

// onward to the HTML!

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page Title</title>
</head>
<body>

<form method="POST">
	<table>
		<tr>
			<td>Search for:</td>
			<td><input id="searchText" name="searchText" type="text"></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit">Search</button></td>
		</tr>
	</table>
</form>
<ul>
	<li><a href="add-record.php">Add Record</a></li>
	<li><a href="index.php">Read Schedule</a></li>
	<li><a href="search-schedule.php">Search Schedule</a></li>
</ul>


</body>
</html>
