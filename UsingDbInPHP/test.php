<?php
try {
	$dsn = 'mysql:host=localhost:8081;dbname=testdb';
	$db = new PDO('mysql:host=localhost;dbname=testdb', 'test', '123456');
	
	// try to update account
	$newName = 'Duong1';
	$sql = "UPDATE Account
			SET Name = '$newName'
			WHERE Id = 1 ";
	$db->exec($sql);
	$accounts = $db->query('SELECT * FROM Account');
	foreach ($accounts as $account) {
		print $account['Name'] . '<br>';
	}
} catch (PDOException $ex) {
	die("Exception occur: $ex");
}
?>

<ul>
<?php foreach ($accounts as $account) : ?>
<li><?php $account['Name']?></li>
<?php endforeach;?>
</ul>