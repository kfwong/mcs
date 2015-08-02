<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db = "mcs";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	echo "<p>Connected successfully</p>";

	// //@@@@@@@@@@@@@@@@@@@@@@
	
	// // prepare and bind
	// $stmt = $conn->prepare("INSERT INTO students (student_id, name) VALUES (?, ?)");
	// $stmt->bind_param("ss", $student_id, $name);

	// // set parameters and execute
	// $student_id = "790872";
	// $name = "Kidd Tang";
	// $stmt->execute();

	// echo "<p>New records created successfully</p>";

	// //@@@@@@@@@@@@@@@@@@@@@@

	// // prepare and bind
	// $stmt = $conn->prepare("INSERT INTO attendance (date, has_attended, student_id) VALUES (?, ?, ?)");
	// $stmt->bind_param("sis", $date, $has_attended, $student_id);

	// // set parameters and execute
	// $date =  date("Y-m-d H:i:s");
	// $has_attended = true;
	// $student_id = "790872";

	// $stmt->execute();

	// echo "<p>New records created successfully</p>";

	// //@@@@@@@@@@@@@@@@@@@@@@

	$stmt = $conn->prepare("SELECT * FROM attendance");
	$stmt->execute();
	
	$results = $stmt->get_result();

	

?>

<p> My Attendance</p>

<table>
	<caption>Attendance</caption>
	<thead>
		<tr>
		    <th>Student Id</th>		
			<th>Date</th>
			<th>Has Attended</th>
		</tr>
	</thead>
	<tbody>
		<?php
			while($row = $results->fetch_assoc()){
				echo "<tr><td>" . $row['name'] . "<td><td>" . $row['date'] . '</td><td>' . $row['has_attended'] . "</tr>";
			}
		?>
	</tbody>
</table>

<?php

	$stmt->close();
	$conn->close();
?> 