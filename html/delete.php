<?php

echo "<!DOCTYPE html>
<html lang=\"en\">
<body>
<main>
<form align = \"center\" action = \"delete.php\" method=\"post\">
	<label>Item ID</label><br>
	<input type=\"text\" size=25 class=\"textbox\" id=\"txt_iid\" name=\"itemid\" required> <br>
	<hr>
	<button type =\"submit\">Delete Item</button>
</form>";



$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "Watto";



//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
}


$entered_itemid = $_POST['itemid'];


$sql = "SELECT * FROM Item WHERE ItemID=$entered_itemid;";

$result = $conn->query($sql);

if($result->num_rows > 0) {
	$sql = "DELETE FROM Item WHERE ItemID=$entered_itemid;";
	$result = $conn->query($sql);

	$sql = "SELECT * FROM Item WHERE ItemID=$entered_itemid;";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		echo "<p align = \"center\" >
		<b>There was an issue deleting the item</b>
		</p>";	
	} else {
		echo "<p align = \"center\" >
		<b>The item has been deleted</b>
		</p>";	
	}
} else {
	echo "<p align = \"center\" >
	<b>This item does not exist</b>
	</p>";		
}

echo "</body>
</html>";	

$mysqli->close();

?>