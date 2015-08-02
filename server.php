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

	$stmt = $conn->prepare("SELECT * FROM attendance WHERE student_id = ?");
	$stmt->bind_param("s", $student_id);

	$student_id = $_POST['myId'];
	$stmt->execute();
	
	$results = $stmt->get_result();

	

?>

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
				echo "<tr><td>" . $row['student_id'] . "<td><td>" . $row['date'] . '</td><td>' . $row['has_attended'] . "</tr>";
			}
		?>
	</tbody>
</table>

<?php

	$stmt->close();
	$conn->close();
?> 