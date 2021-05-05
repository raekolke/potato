<?

// This page offers a form that submits back to itself to insert new records into the database

// require the database initialization and functions
require 'database-config.php';
require 'database-functions.php';

// read submitted data from the $_POST array
$sitSituation = mysqli_real_escape_string($db, $_POST["visitSituation"]);
$sitQuestion = mysqli_real_escape_string($db, $_POST["visitQuestion"]);
$sit1option = mysqli_real_escape_string($db, $_POST["visit1option"]);
$sit2option = mysqli_real_escape_string($db, $_POST["visit2option"]);
$sit3option = mysqli_real_escape_string($db, $_POST["visit3option"]);
$sitFileName = mysqli_real_escape_string($db, $_POST["visitFileName"]);

if ( ($sitSituation != "") && ($sitQuestion != "") && ($sit1option != "") && ($sit2option != "") && ($sit3option != "") && ($sitFileName != "") ) {

	// insert submitted information into the database
	// ideally we would analyze the info first to confirm it is accurate, but let's live dangerously
	// but we did use mysqli_real_escape_string() above for security reasons
	$sql = "INSERT INTO $databaseTable (situation, question, 1option, 2option, 3option, file_name)
					VALUES ( '$sitSituation', '$sitQuestion', '$sit1option', '$sit2option', '$sit3option', '$sitFileName')";
	
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
			<td>Situation:</td>
			<td><input id="visitSituation" name="visitSituation" type="text"></td>
		</tr>
		<tr>
			<td>Question:</td>
			<td><input id="visitQuestion" name="visitQuestion" type="text"></td>
		</tr>
		<tr>
			<td>Option 1:</td>
			<td><input id="visit1option" name="visit1option" type="text"></td>
		</tr>
		<tr>
			<td>Option 2:</td>
			<td><input id="visit2option" name="visit2option" type="text"></td>
		</tr>
    <tr>
			<td>Option 3:</td>
			<td><input id="visit3option" name="visit3option" type="text"></td>
		</tr>
		<tr>
			<td>File Name:</td>
			<td><input id="visitFileName" name="visitFileName" type="text"></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit">Add Row</button></td>
		</tr>
	</table>
</form>

<ul>
	<li><a href="database-add.php">Add Row</a></li>
	<li><a href="database-index.php">Read Table</a></li>
	<li><a href="database-search.php">Search Table</a></li>
</ul>

</body>
</html>
