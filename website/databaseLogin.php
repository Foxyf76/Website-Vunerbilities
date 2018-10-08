<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<font face="Arial" size="3" color="red"><p>
			Enter Username: <br />
		</font>
		<input type="text" name="Username" size="30">

		<font face="Arial" size="3" color="red"><p>
			Enter Password: <br />
		</font>
		<input type="password" name="Password" size="30">

		<input type="submit"></p>
	</form>
	<?php
	if (isset($_POST['Username'], $_POST['Password']))
	{
		try {
 // 1. Connect to the database
			$data_source_name = 'mysql:host=localhost;dbname=fox_credentials';
			$username = 'root';
			$password = '';

			$conn = new PDO($data_source_name, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 // 2. Build a query
			$postUser = "'".$_POST['Username']."'";
			$postPassword = "'".$_POST['Password']."'";
			$queryUsername = "SELECT * FROM loginDetails WHERE Username = $postUser AND Password = $postPassword";

 // 3. Execute the query
			$resultUsername = $conn->query($queryUsername);

 // 4. Display the results
			echo '<table border=1 cellpadding=1 cellspacing=1>';
			echo '<tr><td><b>Username</b></td><td><b>Password</b></td></tr>';
			foreach($resultUsername as $row)
			{
				$username = $row[0];
				$password = $row[1];
				echo '<tr><td>'.$username.'</td><td>'.$password.'</td></tr>';
			}
			echo '</table>';

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

 // 5. Close the connection
		$conn = null;

 } // end if
 ?>
</body></html>