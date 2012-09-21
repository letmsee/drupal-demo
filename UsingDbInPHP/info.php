<html>
<head>
<title>Input info</title>
</head>
<body>
	<form action="display.php" method="post">
		<label for="Name">Name: </label> 
		<input type="text" name="Name" id="name">
		<input type="submit" value="Submit">
	</form>
	
	<p>Today is: <?php echo date('d-m-Y')?></p>
	<p><?php echo empty($var)?>	
	</p>
	
</body>
</html>
