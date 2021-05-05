<?

// This page lists all the current records in the database

// require the database initialization and functions
require 'database-config.php';
require 'database-functions.php';


// did one or more checked boxes get submitted? let's delete them
if (isset($_POST["situation"])) {
	$sitList = $_POST["situation"];
	foreach ($sitList as $sitID) {
		$sql = "DELETE FROM $databaseTable
						WHERE id=$sitID";
		$result = $db->query($sql);
		if (!$result) die("Delete Error: " . $sql . "<br>" . $db->error);
	}
}

// select all columns (*) in the database
$sql = "SELECT * FROM $databaseTable
				ORDER BY id"; 
$result = $db->query($sql);
if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

// onward to the HTML!

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database</title>
</head>
<body>

<form method='POST'>
<?= outputSitResults($result, true); // call the function that returns HTML for a table
?>
<button type="submit">Delete Checked Rows</button>
</form>

<ul>
	<li><a href="database-add.php">Add Row</a></li>
	<li><a href="database-index.php">Read Table</a></li>
	<li><a href="database-search.php">Search Table</a></li>
</ul>

</body>
</html>
