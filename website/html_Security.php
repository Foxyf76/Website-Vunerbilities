<html>
<head>
	<title>HTML Security</title>
</head>
<body>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<font face="Arial" size="3" color="red"><p>
			Enter Username(MAX LENGTH 10): <br />
		</font>
		<input type="text" maxlength="10" name="Username" size="30"> <!-- #1 Maxlength -->

		<font face="Arial" size="3" color="red"><p>
			Read Only Textbox: <br />
		</font>
		<input type="text" name="read_only " size="30" value="Cannot edit" readonly="true"> <!-- #1 Readonly -->

		<input type="submit"></p>
	</form>

	<?php
	if(isset($_POST['Username']))
	{
		$data = $_POST['Username'];
		echo $data;
	}
	?>
	
</body>
</font>