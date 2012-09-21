<?php
	if (!isset($_POST['Name'])) {
		header('Location: http://google.com');
	}
?>

<ul>
<li>Name: <?php echo $_POST['Name']?></li>
</ul>