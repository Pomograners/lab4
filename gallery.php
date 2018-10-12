<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">

</head>
<header>
	<?php include 'header.php';
		#Open the database
		$dB = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

		#Check connection
		if ($dB->connect_error) {
			echo "Connection Error: " . $dB->connect_error;
			exit();
		}

		$query = "SELECT * FROM gallery";
		$stat = $dB->prepare($query);
		$stat->bind_result($imgID, $imgPath);
		$stat->execute();
	?>
	<img src="header-img.png">
</header>
<body>
	<content>

		<ul id="gallery">
			<?php
				while ($stat->fetch()) {
					echo "<li><img src='" . $imgPath . "''></li>";
				}
			?>

		</ul>
	</content>
</body>
<footer>
	<?php include 'footer.php'; ?>

</footer>
</html>

