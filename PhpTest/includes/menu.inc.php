<?php $currentPage = basename($_SERVER["SCRIPT_FILENAME"])?>
<ul id="nav">
	<li><a href="index.php"
	<?php
		if ($currentPage == "index.php") {
			print "id=\"here\"";
		}
		?>
		>Home</a></li>
	<li><a href="blog.php"
	<?php
		if ($currentPage == "blog.php") {
			print "id=\"here\"";
		}
		?>
		>Blog</a></li>
	<li><a href="gallery.php"
	<?php
		if ($currentPage == "gallery.php") {
			print "id=\"here\"";
		}
		?>
		>Gallery</a></li>
	<li><a href="contact.php"
	<?php
		if ($currentPage == "contact.php") {
			print "id=\"here\"";
		}
		?>
		>Contact</a></li>
</ul>
