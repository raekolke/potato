<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
  
$databaseServer = "161.35.127.119"; // IP number of database, may be on the same server
$databaseName = "rkolkeco_potatoadventure"; // database name
$databaseUser = "rkolkeco_potatoaccess"; // user name
$databasePassword = "lP+mEYzip_xm";  // user password

$databaseTable = "question_table";  // main table name
$outcomeTable = "outcome_table"; // second table name
  
$q = intval($_GET['q']);

$db = new mysqli($databaseServer, $databaseUser, $databasePassword, $databaseName);
if ($db->connect_error) die("Database connection failed: " . $db->connect_error);


  
mysqli_select_db($db,"ajax_demo");
  
$sql = "SELECT * FROM question_table"; 
$result = $db->query($sql);
if (!$result) die("Error: " . $sql . "<br>" . $db->error);

  /*
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Hometown'] . "</td>";
  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
}
echo "</table>";
*/
mysqli_close($db);
?>
</body>
</html>