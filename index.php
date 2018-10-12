<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<header>
	<?php include 'header.php';

		#Open the database
		//$dB = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
		$db = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName); //Procedual way of getting database


		#Check connection
		if (mysqli_connect_errno()/*$dB->connect_error*/) 
		{
			echo "Connection Error: " /*$dB->connect_error*/;
			exit();
		}

		$username = "";
		$password = "";

		#Check search fields
		if (isset($_POST) && !empty($_POST)) {
			$username = htmlentities($_POST['user']);
			$password = htmlentities($_POST['pass']);
		}
			
		$query = "SELECT * FROM users WHERE users.Username = '" . $username . "'AND users.Password = '" . $password . "'";
			$result = mysqli_query($db, $query);
			$row = mysqli_num_rows($result);
		
	?>
	<img src="header-img.png">
</header>
<body>
	<content>
		<ul id="content-upper">
			<li>
				<h2>Book</h2>
			</li>
			<li>
				<img src="book.png">
			</li>
			<li>
				<h2>Club</h2>
			</li>		
		</ul>
		<div id="content-lower">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<a href="cookie.php">Link to Cookie</a>
			<a href="session.php">Link to Session</a>
		</div>
		<br>
		<form id="log-in" method="post">
			<h2>Login</h2>
			<?php 
				
				//Check that the form has been sumbited
				if (isset($_POST) && !empty($_POST)) {

					//Check password and username
					if ($row == 1) {
						//session_regenerate_id(true); //Creates and replaces a new session id
						header('Location: admin.php'); 

					} else {
						echo "<p> Login failed, try a different password or username </p> ";
					}
				}
			?>
			<input type="text" name="user" placeholder="Username">
			<input type="text" name="pass" placeholder="Password">
			<input type="submit" name="button" value="Login">
		</form>
	</content>
</body>
<footer>
	<?php include 'footer.php'; ?>
</footer>
</html>

