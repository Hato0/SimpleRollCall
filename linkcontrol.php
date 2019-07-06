<?php
$servername = "localhost";
$dbname = "BDD";
$username = "root";
$password = "root";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $lien = $utilisation = $tableappel ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$api_key = test_input($_POST["api_key"]);
	if($api_key == $api_key_value) {
		$lien = test_input($_POST["link"]);
		$tableappel = test_input($_POST["tableappel"]);
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO tableURL(adresse)
			VALUES ('" . substr($lien,19) .  "')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	else {
		echo "Wrong API Key provided.";
	}

}
else {
	echo "No data posted with HTTP POST.";
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
