<?

// This page lists all the current records in the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';


// did one or more checked boxes get submitted? let's delete them
if (isset($_POST["appt"])) {
	$apptList = $_POST["appt"];
	foreach ($apptList as $apptID) {
		$sql = "DELETE FROM $databaseTable
						WHERE id=$apptID";
		$result = $db->query($sql);
		if (!$result) die("Delete Error: " . $sql . "<br>" . $db->error);
	}
}

// select all columns (*) in the database
$sql = "SELECT * FROM $databaseTable
				ORDER BY appt"; 
$result = $db->query($sql);
if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

// onward to the HTML!

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple Database List</title>
</head>
<body>

<form method='POST'>
<?= outputApptResults($result, true); // call the function that returns HTML for a table
?>
<button type="submit">Delete Checked Records</button>
</form>

<ul>
	<li><a href="add-record.php">Add Record</a></li>
	<li><a href="index.php">Read Schedule</a></li>
	<li><a href="search-schedule.php">Search Schedule</a></li>
</ul>

</body>
</html>
