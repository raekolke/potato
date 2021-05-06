<?
// retrieving database information
require 'database-config.php';

// get requested id
$requestedID = $_REQUEST["id"];
$requestedID = htmlspecialchars($requestedID);
$requestedID = filter_var($requestedID, FILTER_SANITIZE_STRING);

// get requested table
$requestedTable = $_REQUEST["table"];
$requestedTable = htmlspecialchars($requestedTable);
$requestedTable = filter_var($requestedTable, FILTER_SANITIZE_STRING);

// get id and table information from database
$sql = "SELECT * FROM $requestedTable
WHERE id=$requestedID
ORDER BY id";
$requestedOutput = $db->query($sql);
if (!$requestedOutput) die("List Error: " . $sql . "<br>" . $db->error);

// converting into JSON
$requestedJSON = "0";

if ($requestedOutput->num_rows > 0) {

  $requestedJSON = json_encode( $requestedOutput->fetch_assoc() );

}

// output JSON
echo $requestedJSON;

