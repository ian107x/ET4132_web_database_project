<!doctype html>
<html lang="en-ie">
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
	<link rel="stylesheet" href="stylepage.css">
</head>
<body>
	<?php
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbName = "db_musicSchool";

		$conn = new mysqli( $host, $user, $pass, $dbName );
		if($conn->connect_errno > 0) {
			die( "Unable to access DBMS and/or DB.<br />" );
		}
	?>

		<div class="header">
				<h1>Carlow Music School</h1>
				<p>Home Page</p>
			</div>
			<div class="navbar">
				<a href="index.php">Home Page</a>
				<a href="applicationPage.html">Application page</a>
				<a href="classInfo.php">Classes info</a>
				<a href="teacherInfo.php">Teachers info</a>
				
		</div>
		<div class="main">
		<h1>This is the webpage for the Carlow School of Irish Music. We are a small, new business that aims to teach children the basics of irish music. 
		Information on the teachers available here, and the instruments that they teach are available on the Teacher information page, linked above. 
		The addresses at which the classes will be held are displayed below. </h1>
	<?php
		
		$sql = "SELECT * FROM venues;";
		if(!$result = $conn->query($sql)) {
			die( "There was an error running your SQL command<br />" );
		}
		echo "<table><tr><th>Venue name</th><th>Venue Address</th></tr>";
		while( $row = $result->fetch_assoc() ) {
			$venueName = $row["venue_name"];
			$venueAddress = $row["venue_address"];
			echo "<tr><td>$venueName</td><td>$venueAddress</td></tr>";
		}
		echo "</table>";
		?>
		</div>
		<h2>Applications for a place in our classes
		may only be made on the application page. Classes are held each week, from September through November,
		followed by a more advanced class from February through April.</h2>
		<div class="footer">
			<h1>Thank you for visiting our website.</h1>
		</div>
		<?php
		 $result->free();
		$conn->close();
	?>
</body>
</html>