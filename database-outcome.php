<?

// This page lists all the current records in the outcome table

// require the database initialization and functions
require 'database-config.php';
require 'database-functions.php';


// did one or more checked boxes get submitted? let's delete them
if (isset($_POST["outcome"])) {
	$outList = $_POST["outcome"];
	foreach ($outList as $outID) {
		$sql = "DELETE FROM $outcomeTable
						WHERE id=$outID";
		$result = $db->query($sql);
		if (!$result) die("Delete Error: " . $sql . "<br>" . $db->error);
	}
}

// select all columns (*) in the database
$sql = "SELECT * FROM $outcomeTable
				ORDER BY id"; 
$result = $db->query($sql);
if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

?>

<!-- begin HTML -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database</title>
</head>
<body>

<form method='POST'>
<?= outputOutResults($result, true); // call the function that returns HTML for a table
?>
<button type="submit">Delete Checked Rows</button>
</form>

<ul>
	<li><a href="outcome-add.php">Add Row</a></li>
  <li><a href="database-outcome.php">Read Table</a></li>
	<li><a href="outcome-search.php">Search Table</a></li>
  <li><a href="database-index.php">Situation Table</a></li>
</ul>

</body>
</html>
