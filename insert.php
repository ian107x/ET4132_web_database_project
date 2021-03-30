<!doctype html>
<html lang="en-ie">
<head>
    <meta charset="utf-8">
    <title>Student Application</title>
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
				<h1>Irish Music School</h1>
				<p>Student Application Page</p>
			</div>
			<div class="navbar">
				<a href="index.php">Home Page</a>
				<a href="applicationPage.html">Application page</a>
				<a href="classInfo.php">Classes info</a>
				<a href="teacherInfo.php">Teachers info</a>
				
				
				
			</div>
			<!--The following php code was derived from an example provided at https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php -->
			<?php
			$first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
			$last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
			$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
			$classid = mysqli_real_escape_string($conn, $_REQUEST['classid']);
			$sql = "INSERT INTO studentinfo (last_name, first_name, email, class_id) VALUES ('$last_name','$first_name','$email','$classid')";
			if( !$result = $conn->query($sql) ) {
				die( "Unable to process your SQL command, as it has either failed, or not yet attempted.<br />" );
			}else{
				echo "<h1>Application successfully completed.</h1>";
			}
			?>
			<div class="footer">
				<h1>Thank you for visiting our website.</h1>
			</div>
		<?php
			$conn->close();
		?>
		
		
</body>
</html>