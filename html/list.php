<?php

echo "<!DOCTYPE html>
<html lang=\"en\">
<body>
<main>

<p align = \"center\" >
	<b>Item ID</b><br>
	<b>Item Name</b><br>	
	<b>Item Quantity</b>
</p>
<hr>
";

include 'connect.php';

$sql = "SELECT * FROM Item;";

$result = $conn->query($sql);

if($result->num_rows > 0) {
	while ($row = $result->fetch_array()) {
		echo "<p align = \"center\" style=\"border:3px; border-style:solid; border-color:#000000; padding: 1em;\">
			<b>{$row['ItemID']}</b><br>
			<b>{$row['ItemName']}</b><br>
			<b>{$row['ItemQuantity']}</b><br>
		</p>";
	}
} else {
	echo "<p align = \"center\" >
	There are no items to display</p>";	
}

echo "</body>
</html>";	

$mysqli->close();

?>
