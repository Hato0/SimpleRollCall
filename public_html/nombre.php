<!DOCTYPE html>
<html>
<body>
<?php
/*
 *   Rui Santos
 *     Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
 *       
 *         Permission is hereby granted, free of charge, to any person obtaining a copy
 *           of this software and associated documentation files.
 *             
 *               The above copyright notice and this permission notice shall be included in all
 *                 copies or substantial portions of the Software.
 *                 */

$servername = "localhost";

// REPLACE with your Database name
$dbname = "BDD";
// // REPLACE with Database user
$username = "root";
// // REPLACE with Database user password
$password = "root";
//
// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//
$sql = "SELECT count(*) as c,nom FROM tableAppel; ";




/*if($sql==false){
	echo' BONJOUR';
	header('Location: AuthentificationFailed.html');
}*/

//
echo '<table cellspacing="5" cellpadding="5">
	<tr> 
	<td>Nom</td> 
	<td>Prenom</td> 
	</tr>';

if ($result = $conn->query($sql)) {
	while ($row= $result->fetch_assoc()){
		$row_id=$row["c"];
		$row_sensor=$row["nom"];

		//                                                                                                                                                            
		//                                                                                                                                                                    // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
		//                                                                                                                                                                            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
		//        
		//
		echo $row_id;
	}

$result->free();
}

$conn->close();
?> 
																																								</table>
																																								</body>
																																								</html>
