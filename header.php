<?php
	include 'config.php';
?>

<ul id="main-menu">
	<li>
		<a class="<?php echo($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
	</li>
	<li>
		<a class="<?php echo($current_page == 'about.php') ? 'active' : NULL ?>" href="about.php">About Us</a>
	</li>
	<li>
		<a class="<?php echo($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php">Gallery</a>
	</li>
	<li>
		<a class="<?php echo($current_page == 'browse.php') ? 'active' : NULL ?>" href="browse.php">Browse Books</a>
	</li>
	<li>
		<a class="<?php echo($current_page == 'mybooks.php') ? 'active' : NULL ?>" href="mybooks.php">My Books</a>
	</li>
	<li>
		<a class="<?php echo($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a>
	</li>
</ul>