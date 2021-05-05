<?
require 'database-config.php';

//recieve and process $_GET data

// what are these requested things getting the information from? are they actually doing anything?

//get requested id
$requestedID = $_REQUEST["id"];
$requestedID = htmlspecialchars($requestedID);
$requestedID = filter_var($requestedID, FILTER_SANITIZE_STRING);

//get requested list
$requestedTable = $_REQUEST["table"];
$requestedTable = htmlspecialchars($requestedTable);
$requestedTable = filter_var($requestedTable, FILTER_SANITIZE_STRING);

//get information from database
$sql = "SELECT * FROM $databaseTable
ORDER BY id";
$requestedOutput = $db->query($sql);
if (!$requestedOutput) die("List Error: " . $sql . "<br>" . $db->error);

//converting into JSON
$requestedJSON = "0";


// I think this needs to be changed but I do not understnad what any of this means

if ($requestedOutput->num_rows > 0) {
$outputArray = [];
while( $row = $requestedOutput->fetch_assoc() ) {
$outputArray[] = $row;
}
$requestedJSON = json_encode($outputArray);
}

//output JSON
echo $requestedJSON;

