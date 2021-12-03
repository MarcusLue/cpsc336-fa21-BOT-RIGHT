<?php

echo "<!DOCTYPE html>
<html lang=\"en\">

<body>
<main>
<form align = \"center\" action=\"insert.php\" method=\"post\">
	<label>Item ID</label><br>
	<input type=\"number\" size=25 class=\"textbox\" id=\"txt_iid\" name=\"itemid\" required> <br>
	<label>Item Name</label><br>
	<input type=\"text\" size=25 class=\"textbox\" id=\"txt_iname\" name=\"itemname\" required> <br>
	<label>Item Quantity</label><br>
	<input type=\"number\" size=25 class=\"textbox\" id=\"txt_iqty\" name=\"itemqty\" required><br>
	<hr>
	<button type=\"submit\">Insert Item</button>
</form>";

include 'connect.php';

$entered_itemid = $_POST['itemid'];
$entered_itemname = $_POST['itemname'];
$entered_itemqty = $_POST['itemqty'];

$sql = "SELECT * FROM ITEM WHERE ItemID=$entered_itemid;";
$result = $conn->query($sql);

if (!$result->num_rows) {
	$sql = "INSERT INTO Item (ItemID, ItemName, ItemQuantity) VALUES ({$entered_itemid},'{$entered_itemname}',{$entered_itemqty});";
	echo $sql;
	$result = $conn->query($sql);
	
	$sql = "SELECT * FROM Item WHERE ItemID=$entered_itemid;";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo "<p align = \"center\" >
		<b>The item has been inserted</b>
		</p>";
	} else {
		echo "<p align = \"center\" >
		<b>There was an issue inserting the item</b>
		</p>";
	}
} else {
	echo "<p align = \"center\" >
	<b>This item already exists</b>
	</p>";
}

echo "</body>
</html";

$mysqli->close();

?>
