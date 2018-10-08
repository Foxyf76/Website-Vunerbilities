<html>
<head>
	<title>Users</title>
</head>
<body>
	<?php
	try
	{
 // 1. Connect to the database
		$data_source_name = 'mysql:host=localhost;dbname=fox_credentials';
		$username = 'root';
		$password = '';

		$conn = new PDO($data_source_name, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 // 2. Build a query
		$query = "SELECT * FROM loginDetails";

 // 3. Execute the query
		$result = $conn->query($query);

 // 4. Display the results
		echo '<table border=1 cellpadding=1 cellspacing=1>';
		echo '<tr><td><b>Username</b></td><td><b>Password</b></td></tr>';
		foreach($result as $row)
		{
			$username = $row[0];
			$password = $row[1];
			echo '<tr><td>'.$username.'</td><td>'.$password.'</td></tr>';
		}
		echo '</table>';
	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' . $e->getMessage();
	}

 // 5. Close the connection
	$conn = null;
	?>
</body>
</html>