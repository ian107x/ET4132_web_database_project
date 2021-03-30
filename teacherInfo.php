<!doctype html>
<html lang="en-ie">
<head>
    <meta charset="utf-8">
    <title>Teacher Info</title>
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
			<p>Teachers Information</p>
		</div>
		<div class="navbar">
			<a href="index.php">Home Page</a>
			<a href="applicationPage.html">Application page</a>
			<a href="classInfo.php">Classes info</a>
			<a href="teacherInfo.php">Teachers info</a>
			
	</div>
	<h2>Below you will find information about our teachers. If you have any questions about the courses we provide, please contact our teachers via the e-mails listed below. </h2>
<?php
	
		$sql = "SELECT * FROM teachers;";
		if(!$result = $conn->query($sql)) {
			die( "There was an error running your SQL command<br />" );
		}
		echo "<table><tr><th>First name</th><th>Last Name</th><th>Instrument Taught</th><th>email</th></tr>";
		while( $row = $result->fetch_assoc() ) {
			$firstName = $row["teacher_firstname"];
			$lastName = $row["teacher_lastname"];
			$instrument = $row["instrument"];
			$email = $row["email"];
			echo "<tr><td>$firstName</td><td>$lastName</td><td>$instrument</td><td>$email</td></tr>";
		}
		echo "</table>";
   ?>
   
	<div class="footer">
		<h1>Thank you for visiting our website.</h1>
	</div>
	<?php	
    $conn->close();
?>
</body>
</html>