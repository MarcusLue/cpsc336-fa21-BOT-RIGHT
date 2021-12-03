<?php

echo "<!DOCTYPE html>
<html lang=\"en\">
<body>
<main>
<form align = \"center\" action = \"insert.php\" method=\"post\">
	<label>Item ID</label><br>
	<input type=\"number\" size=25 class=\"textbox\" id=\"txt_iid\" name=\"itemid\" required> <br>
	<label>Item Name</label><br>
	<input type=\"text\" size=25 class=\"textbox\" id=\"txt_iname\" name=\"itemname\" required> <br>
	<label>Item Quantity</label><br>
	<input type=\"number\" size=25 class=\"textbox\" id=\"txt_iqty\" name=\"itemquantity\" required> <br>
	<hr>
	<button type =\"submit\">Add Item</button>
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
$entered_itemname = $_POST['itemname'];
$entered_itemqty = $_POST['itemquantity'];


$sql = "SELECT * FROM Item WHERE ItemID=$entered_itemid;";

$result = $conn->query($sql);

if($result->num_rows > 0) {
	echo "<p align = \"center\" >
	<b>This item already exists</b>
	</p>";
} else {
	$sql = "INSERT INTO Item(ItemID, ItemName, ItemQuantity) VALUES ({$entered_itemid}, '{$entered_itemname}', {$entered_itemqty});";
	$result = $conn->query($sql);
	$sql = "SELECT * FROM Item WHERE ItemID=$entered_itemid;";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		echo "<p align = \"center\" >
		<b>The item has been added</b>
		</p>";
	} else {
		echo "<p align = \"center\" >
		<b>There was an issue inserting the item</b>
		</p>";
	}
}

echo "</body>
</html>";	

$mysqli->close();

?>