<!DOCTYPE html>
<html><body>
<?php

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

$id=$_POST['numero'];
//
$sql = "SELECT nom,prenom FROM Professeur where ID='$id'; ";




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
	while ($row = $result->fetch_assoc()) {
		$row_id = $row["nom"];
		$row_sensor = $row["prenom"];
		echo '<tr> 
			<td>' . $row_id . '</td> 
			<td>' . $row_sensor . '</td> 
			</tr>';
}


/*
if ($result->num_rows==-1){
	header('Location: AuthentificationFailed.php');
}
else {
	header('Location: CreateCallTeacher.php');
}
 

$result->free();
}

$conn->close()  ;*/
?> 
																																								</table>
						<form method="post" name="formu" action="CreateCallTeacher.php">
<SELECT name="level" on change="soumettre()">
						<input  name="numerobis" value="<?php echo htmlspecialchars($id); ?>">
</select>
</form>																																		</body>
																																						</html>	

<script type="text/javascript"> 
	function soumettre()
	{
		document.forms['formu'].submit();} 
</script>
<?php
if ($result->num_rows==-1){
	header('Location: AuthentificationFailed.php');
}
else {
	header('Location: CreateCallTeacher.php');
}




$result->free();
}

$conn->close();
?> 
