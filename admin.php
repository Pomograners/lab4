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

	/*

	ini_set('session.cookie_httponly', true); //Acess cookie only though php
	session_start();


	if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){ //if not the same
		#Remove all session variables
		session_unset(); 
		#Destroy session
		session_destroy();
    }*/


		#Open the database
		//$dB = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
		$db = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName); //Procedual way of getting database

		#Check connection
		if (mysqli_connect_errno()/*$dB->connect_error*/) 
		{
			echo "Connection Error: " /*$dB->connect_error*/;
			exit();
		}



		#Check file field
		if (isset($_POST) && !empty($_FILES['fileUpload']['name'])) {

			#Arrays & varaibles
			$allowedFileTypes = array('jpg', 'jpeg', 'png');
			$savedErrors = [];
			 
			$uploadFolder = "uploads/";
			$filePath = $uploadFolder . basename($_FILES["fileUpload"]["name"]);

			#Check extention
			$fileType = strtolower(substr($_FILES['fileUpload']['name'], strrpos($_FILES['fileUpload']['name'], '.') + 1));

			if ($fileType == $allowedFileTypes[0] || $fileType == $allowedFileTypes[1] || $fileType == $allowedFileTypes[2])
			{} else {
					$savedErrors[] = "Your file is not an allowed file type.";
				}

			//Sometimes it doesent find a size and there is an error and the file does not upload at al
			
			/*#Check file size
			if ($_FILES['fileUpload']['size'] > 3000000) { //Checks if bigger than 3 MB
				$savedErrors[] = "Your file has a to big file size";
			}*/

			#Check for duplicate
			if (file_exists($filePath)) {
				$savedErrors[] = "A file with that name already exists.";
			}

			#Show errors
			if (empty($savedErrors)) {
				if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filePath)) {

					$query = "INSERT INTO gallery (ImgPath) VALUES ('" . $filePath . "')";

					$stat = $db->prepare($query);
					$stat->execute();

        			echo "The file has been uploaded.";
    			} else {
       				 echo "There were an error in the upload, try again!";}
			} else {
				$x = 0;
				foreach ($savedErrors as $value) {
					echo $savedErrors[$x] . "<br>";
					$x++;
				}
       		}
		}
	?>
	<img src="header-img.png">
</header>
<body>
	<content>
		<form method="post" enctype="multipart/form-data">
			<h2>File Uploader</h2>
			<p>Upload a file to the gallery page. Allowed files are jpg, jpeg & png. </p> <br>
			<input type="file" name="fileUpload">
			<input type="submit" name="subButt" value="Upload">
		</form>
	</content>
</body>
<footer>
	<?php include 'footer.php'; ?>
</footer>
</html>

<!--session_set_cookie_params(time()+3600, '/', 'localhost', false, true ); //Creates a cokie that dosent allows scrpiting to acces it (only php)-->