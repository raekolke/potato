<?

// This page offers a form that submits back to itself to insert new records into the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';

// read submitted data from the $_POST array
$apptTime = mysqli_real_escape_string($db, $_POST["visitDateTime"]); // YYYY-MM-DD HH:MM:SS
$apptPatientName = mysqli_real_escape_string($db, $_POST["visitPatientName"]);
$apptPatientComplaint = mysqli_real_escape_string($db, $_POST["visitComplaint"]);
$apptPhysician = mysqli_real_escape_string($db, $_POST["visitDoctor"]);


if ( ($apptTime != "") && ($apptPatientName != "") && ($apptPatientComplaint != "") && ($apptPhysician != "") ) {

	// insert submitted information into the database
	// ideally we would analyze the info first to confirm it is accurate, but let's live dangerously
	// but we did use mysqli_real_escape_string() above for security reasons
	$sql = "INSERT INTO $databaseTable (appt, patient_name, patient_complaint, physician_name)
					VALUES ( '$apptTime', '$apptPatientName', '$apptPatientComplaint', '$apptPhysician')";
	
	$result = $db->query($sql); // process the SQL logic above, and get a result back
	
	if (!$result) die("Insert Error: " . $sql . "<br>" . $db->error);
	
}

// onward to the HTML!

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Records</title>
</head>
<body>

<form method="POST">
	<table>
		<tr>
			<td>Date/time:</td>
			<td><input id="visitDateTime" name="visitDateTime" type="datetime-local"> (YYYY-MM-DD HH:MM:SS)</td>
		</tr>
		<tr>
			<td>Patient:</td>
			<td><input id="visitPatientName" name="visitPatientName" type="text"></td>
		</tr>
		<tr>
			<td>Complaint:</td>
			<td><input id="visitComplaint" name="visitComplaint" type="text"></td>
		</tr>
		<tr>
			<td>Physician:</td>
			<td><input id="visitDoctor" name="visitDoctor" type="text"></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit">Record Appt.</button></td>
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
