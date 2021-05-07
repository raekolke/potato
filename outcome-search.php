<?

// This page offers a form that submits back to itself to search for records in the database

// require the database initialization and functions
require 'database-config.php';
require 'database-functions.php';

// get search value from the submitted POST array
$search = $_POST["searchText"];

if ($search != "") {

	// select all columns (*) in rows where the $search appears in 
	// outcome OR try_again OR file_name
	$sql = "SELECT * FROM $outcomeTable
					WHERE outcome LIKE '%$search%'
					OR try_again LIKE '%$search%' 
					OR file_name LIKE '%$search%'
					ORDER BY id"; 
	$result = $db->query($sql);
	if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

	echo outputOutResults($result); // call the function that outputs a table
	
}

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
	<li><a href="outcome-add.php">Add Row</a></li>
  <li><a href="database-outcome.php">Read Table</a></li>
	<li><a href="outcome-search.php">Search Table</a></li>
  <li><a href="database-index.php">Situation Table</a></li>
</ul>


</body>
</html>