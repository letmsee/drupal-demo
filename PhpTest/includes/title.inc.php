<?php
$title = basename($_SERVER["SCRIPT_FILENAME"], ".php");
if ($title = "index") {
	$title = "Home";
}
$title = ucfirst($title);
