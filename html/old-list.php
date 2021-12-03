<?php

echo "<!DOCTYPE html>
<html lang=\"en\">

<body>
<main>

<p align=\"center\" >
	<b>Item ID</b><br>
	<b>Item Name</b><br>
	<b>Item Quantity</b><br>
</p>

<hr>";

include 'connect.php';

$sql = "SELECT * FROM Item";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<tr>
		<th>Item ID</th>
		<th>Item Name</th>
		<th>Item Quantity</th>
	</tr>";
	while ($row = $result->fetch_array()) {
		echo "<tr>
			<th>{$row['ItemID']}</th>
			<th>{$row['ItemName']}</th>
			<th>{$row['ItemQuantity']}</th>
		</tr>";
	}
} else {
	echo "<p align = \"center\" >
	<b>There are no items to display</b>
	</p>";
}

echo "</body>
</html";

$mysqli->close();

?>
