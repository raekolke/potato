<?

require 'database-config.php';

//recieve and process $_GET data

//get requested id
$requestedID = $_REQUEST["id"];
$requestedID = htmlspecialchars($requestedID);
$requestedID = filter_var($requestedID, FILTER_SANITIZE_STRING);

//get requested list
$requestedList = $_REQUEST["list"];
$requestedList = htmlspecialchars($requestedList);
$requestedList = filter_var($requestedList, FILTER_SANITIZE_STRING);

//get information from database
$sql = "SELECT * FROM $databaseTable
WHERE name='$situation'
ORDER BY id";
$requestedOutput = $db->query($sql);
if (!$requestedOutput) die("List Error: " . $sql . "<br>" . $db->error);

//converting into JSON
$requestedJSON = "0";

if ($requestedOutput->num_rows > 0) {
$outputArray = [];
while( $row = $requestedOutput->fetch_assoc() ) {
$outputArray[] = $row;
}
$requestedJSON = json_encode($outputArray);
}

//output JSON
echo $requestedJSON;

