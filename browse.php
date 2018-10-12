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

		$searchAuthor = "";
		$searchBook = "";

		#Check search fields
		if (isset($_POST) && !empty($_POST)) {
			$searchAuthor = htmlentities($_POST['author']);
			$searchBook = htmlentities($_POST['book']);
		}

		/*
		SELECT * FROM books
		JOIN author_books ON books.BookID = author_books.Book_ID
		JOIN author ON author.AuthorID = author_books.Author_ID 
		WHERE books.Title LIKE '%'
		*/

		$query = "SELECT * FROM books 
		JOIN author_books ON books.BookID = author_books.Book_ID 
		JOIN author ON author.AuthorID = author_books.Author_ID ";

		if ($searchBook && !$searchAuthor) {
			$query = $query . "WHERE books.Title LIKE '%" . $searchBook ."%'";
		}

		if (!$searchBook && $searchAuthor) {
			$query = $query . "WHERE author.F_name LIKE '%" . $searchAuthor ."%'";
		}

		if ($searchBook && $searchAuthor) {
			$query = $query . "WHERE author.F_name LIKE '%" . $searchAuthor ."%' AND books.Title LIKE '%" . $searchBook ."%'";
		}

		$stat = $dB->prepare($query);
		$stat->bind_result($bID, $isbn, $title, $pages, $edition, $pub_year, $inc_date, $reserved, $uID, $x, $y, $aID, $authorName, $authorLname, $PN, $byear, $link);
		$stat->execute();
	?>
	<img src="header-img.png">
</header>
<body>
	<content>
		<form method="post">
			<input type="text" id="book" name="book" placeholder="Book">
			<input type="text" id="author" name="author" placeholder="Author">
			<input type="submit" value="Search">
		</form>

		<ul class="bookList">
			<?php
				$nr = 0; //book nr in serach list

				//Array stuff
				$bID_array = [];
				$reserved_array = [];

				while ($stat->fetch()) {
					if ($reserved) {
						$onLoan = "Not avaliable";
						$button = "Return";
					} else {
						$onLoan = "Avaliable";
						$button = "Reserve";
					}

					$nr++;

					echo "<li><h3>" . $nr . " " . $title . "</h3><p>" . $authorName . " " . $authorLname . "</p><h4>" . $onLoan . "</h4><form method='get'><input class='resButt' type='submit' name='button' value='" . $button . "'><input type='hidden' name='" . $bID . "' value='test'></form></li>";

					$bID_array[] = $bID;
					$reserved_array[] = $reserved;

				}

				//Update the book id for the books the reserve button was pressed on
				if (isset($_GET['button'])) {
					$z = 0;

					foreach ($bID_array as $value) {
						if (isset($_GET[$bID_array[$z]])) { //Checks for which button was pressed

							//Changes true/false form
							$editReserve = !$reserved_array[$z]; 

							//Update query
							$update = "UPDATE books 
							SET Reserved = '" . $editReserve . "' WHERE BookID= ";
							$update = $update . $bID_array[$z];
							
							//Executes
							$cat = $dB->prepare($update);
							$cat->execute();
							header('Location: browse.php'); 
						}
						$z++;
					}
				}
			?>

		</ul>
	</content>
</body>
<footer>
	<?php include 'footer.php'; ?>
</footer>
</html>

