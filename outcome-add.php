<?

// This page offers a form that submits back to itself to insert new records into the database

// require the database initialization and functions
require 'database-config.php';
require 'database-functions.php';

// read submitted data from the $_POST array
$outOutcome = mysqli_real_escape_string($db, $_POST["visitOutcome"]);
$outTryAgain = mysqli_real_escape_string($db, $_POST["visitTryAgain"]);
$outFileName = mysqli_real_escape_string($db, $_POST["visitOutFileName"]);


if ( ($outOutcome != "") && ($outTryAgain != "") && ($outFileName != "") ) {

	// insert submitted information into the database
	// ideally we would analyze the info first to confirm it is accurate, but let's live dangerously
	// but we did use mysqli_real_escape_string() above for security reasons
	$sql = "INSERT INTO $outcomeTable (outcome, try_again, file_name)
					VALUES ( '$outOutcome', '$outTryAgain', '$outFileName')";
	
	$result = $db->query($sql); // process the SQL logic above, and get a result back
	
	if (!$result) die("Insert Error: " . $sql . "<br>" . $db->error);
	
}

// onward to the HTML!

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Row</title>
</head>
<body>

<form method="POST">
	<table>
		<tr>
			<td>Outcome:</td>
			<td><input id="visitOutcome" name="visitOutcome" type="text"></td>
		</tr>
		<tr>
			<td>Try Again:</td>
			<td><input id="visitTryAgain" name="visitTryAgain" type="text"></td>
		</tr>
		<tr>
			<td>File Name:</td>
			<td><input id="visitOutFileName" name="visitOutFileName" type="text"></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit">Add Row</button></td>
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
