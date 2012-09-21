
<?php include 'includes/title.inc.php';?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8">
<title>Japan Journey <?php print "$title"?>
</title>
<link href="styles/journey.css" rel="stylesheet" type="text/css"
	media="screen">
</head>

<?php 
try {
	print "<p>Duong</p>"; 
	throw new Exception("definite error");
} catch (Exception $ex) {
} 
?>


<body>
	<div id="header">
		<h1>Japan Journey</h1>
	</div>
	<div id="wrapper">
		<?php include("includes/menu.inc.php");?>
		<div id="maincontent">
			<h2>A Journey through Japan with PHP</h2>
			<p>Ut enim ad minim veniam, quis nostrud exercitation consectetur
				adipisicing elit. Velit esse cillum dolore ullamco laboris nisi in
				reprehenderit in voluptate. Mollit anim id est laborum. Sunt in
				culpa duis aute irure dolor excepteur sint occaecat.</p>
				<?php include 'includes/image.inc.php';?>
			<p>Eu fugiat nulla pariatur. Ut labore et dolore magna aliqua.
				Cupidatat non proident, quis nostrud exercitation ut enim ad minim
				veniam.</p>
			<p>Consectetur adipisicing elit, duis aute irure dolor. Lorem ipsum
				dolor sit amet, ut enim ad minim veniam, consectetur adipisicing
				elit. Duis aute irure dolor ut aliquip ex ea commodo consequat.</p>
			<p>Quis nostrud exercitation eu fugiat nulla pariatur. Ut labore et
				dolore magna aliqua. Sed do eiusmod tempor incididunt velit esse
				cillum dolore ullamco laboris nisi.</p>
			<p>Sed do eiusmod tempor incididunt ullamco laboris nisi consectetur
				adipisicing elit. Ut aliquip ex ea commodo consequat. Qui officia
				deserunt ut labore et dolore magna aliqua. Velit esse cillum dolore
				eu fugiat nulla pariatur. Sed do eiusmod tempor incididunt cupidatat
				non proident, sunt in culpa. Sunt in culpa duis aute irure dolor
				excepteur sint occaecat.</p>
			<p>Quis nostrud exercitation eu fugiat nulla pariatur. Ut labore et
				dolore magna aliqua. Sunt in culpa duis aute irure dolor excepteur
				sint occaecat.</p>
		</div>
		<?php include 'includes/footer.inc.php';?>
	</div>
</body>
</html>
