<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Demo</title>
	</head>
	<body>
		<p>Here are some names from the database.</p>
		<br>

		<?php

		/* php file to establish mysql connection and query database */

		/* servername name should remain static,
		replace username, password, and dbname with proper parameters */
		$servername = "localhost";
		$username = "jerry";
		$password = "jerry";
		$dbname = "assignment1";

		/* create connection,
		note this connection is using a mysqli connection,
		this connection is ONLY intended for MySQL databases,
		for other database connections use PDO */
		$conn = new mysqli($servername, $username, $password, $dbname);

		/* verify a unsuccessful connection */
		if ($conn->connect_error)
		    die("Connection failed: " . $conn->connect_error);

		/* build database query,
		everything between SELECT and FROM are your table columns,
		to the right of FROM is your table */
		// "*" is a wildcard, meaning all the columns are selected
		$sql = "SELECT * FROM tenants";

		/* query database */
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    /* fetch results */
		    while($row = $result->fetch_assoc()) {
					if (($row["tenant_id"] - 1) % 10 == 0) echo "<br>";
				echo $row["tenant_id"]." ".$row["first_name"]." ". $row["last_name"]." ".$row["email"]
				.$row["apartment_address"]." ".$row["phone"]." ". $row["landlord_id"]." ".$row["apartment_id"]
				.$row["lease_start"]." ".$row["lease_end"]." ". $row["next_payment"]." ".$row["payment_amount"]."<br>";
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		?>
	</body>
</html>
