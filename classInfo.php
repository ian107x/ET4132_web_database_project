<!doctype html>
<html lang="en-ie">
<head>
    <meta charset="utf-8">
    <title>Class Information</title>
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
				<p>Class Information</p>
			</div>
			<div class="navbar">
				<a href="index.php">Home Page</a>
				<a href="applicationPage.html">Application page</a>
				<a href="classInfo.php">Classes info</a>
				<a href="teacherInfo.php">Teachers info</a>
				
				
				
			</div>
<?php			
	  if( isset( $_GET["class_id"] ) ) {
        $id = $_GET["class_id"];
        $sql = "SELECT * FROM class_info WHERE class_id = '$id';";

        if( !$result = $conn->query($sql) ) {
            die( "Unable to process your SQL command.<br />" );
        }

        echo "<table><tr><th>ID</th><th>Class name</th><th>Start time</th><th>End time</th><th>Day</th><th>Venue</th><th>Teacher(last name)</th></tr>";
    
        while($row = $result->fetch_assoc()) {
            $id = $row["class_id"];
            $name = $row["class_name"];
            $start = $row["start_time"];
            $end = $row["end_time"];
			$day = $row["day"];
			$venue = $row["venue_name"];
			$teacherName = $row["teacher_lastname"];
        
            echo "<tr><td>$id</td><td>$name</td><td>$start</td><td>$end</td><td>$day</td><td>$venue</td><td>$teacherName</td></tr>";
        }
    
        echo "</table>";
    } else {
		?>
		<h1>Please select the class information you wish to view from the drop down list below:</h1>

		<form action="classInfo.php" method="GET">
		<select name="class_id" id="class_id" tabindex="1" autofocus="autofocus">
			<option value=""></option>
		<?php
			$formSQL = "SELECT class_id, class_name FROM class_info;";
			if( !$result = $conn->query($formSQL) ) {
				die( "Unable to process your SQL command.<br />" );
			}

			while($row = $result->fetch_assoc()) {
				$id = $row["class_id"];
				$name = $row["class_name"];
				
				echo "<option value=\"$id\">$name </option>";
			}
		?>
		</select>
		<input type="submit" tabindex="2" value="Get Details" />
		</form>
		<h3>Tuition fees are €5 per class, to be paid each week, or in a lump sum of €60 at the start of each semester. Failure to pay fees without good reason will result in a student being
		denied access to the classes.</h3>
		<div class="footer">
			<h1>Thank you for visiting our website.</h1>
		</div>
<?php
	}
    $result->free();
    $conn->close();
?>
</body>
</html>