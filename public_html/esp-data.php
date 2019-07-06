<!DOCTYPE html>
<html><body>
<?php

$servername = "localhost";
$dbname = "BDD";
$username = "root";
$password = "root";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['numero'];
$sql = "SELECT nom,prenom,TD,TP,annee,dept FROM etudiants where NBET='".$id."';";
$sqll="show tables in BDD;";

if($sql==false){
	header('Location: AuthentificationFailed.php');
}

if ($result = $conn->query($sql)) {
	while ($row = $result->fetch_assoc()) {
		$row_nom = $row["nom"];
		$row_prenom = $row["prenom"];
		$row_TP=$row["TP"];
		$row_TD=$row["TD"];
		$row_annee=$row["annee"];
		$row_dept=$row["dept"];
	}

}
if ($result->num_rows==0){

	header('Location: AuthentificationFailed.php');
}
else {
	 $res=$conn->query($sqll);
		while ($roww=$res->fetch_assoc()){
			foreach($roww as $table){
				if (strcmp("appel".$row_annee.$row_dept,$table) == 0){
					$final_table=$table;
				}
				if (strcmp("appel".$row_annee.$row_dept.$row_TD,$table)==0){
					$final_table=$table;
				}
				if (strcmp("appel".$row_annee.$row_dept.$row_TP,$table)==0){
					$final_table=$table;
				}

			}
		}
}
$sqlll = "INSERT INTO $final_table VALUES ($id,0,'".$row_nom."','".$row_prenom."');";
if ($ress=$conn->query($sqlll)){
	session_start();
	$_SESSION = array();
	session_destroy();
	header ('Location: LoginSuccessStudent.html');
}
else{ 
	
	header('Location: AuthentificationFailed.php');
}



$res->free();
$ress->free();
$result->free();

 
$conn->close();
?> 
</table>
</body>
</html>
