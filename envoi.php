<!DOCTYPE html>
<html><body>

<?php 

$servername="localhost";
$dbname="BDD";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password,$dbname);
session_start();
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}
else{
	
$dept=$_POST["departement"];
$annee=$_POST["annee"];
$TD=$_POST["TD"];
$TP=$_POST["TP"];
$BoitierisOn=$_POST["TDSetUp"];
$nom=$_SESSION['nom'];
if ($TD=="NULL"){ 
       if($TP=="NULL"){
	$sql= "SELECT * from etudiants where dept='$dept' and annee='$annee';";

	if ($result=$conn->query($sql)){ 
		if ($result->num_rows==0){
		header ('Location: CreateCallTeacherFailed.php');}
		else{
			$sqll = "CREATE TABLE appel".$annee.$dept."(
				nbet INT NOT NULL ,
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nom VARCHAR(20) NOT NULL,
				prenom VARCHAR(20) NOT NULL	
			)";

if($result2=$conn->query($sqll)){
	if (!($BoitierisOn=="TDSet")){
	$fp = fsockopen("192.168.1.28", 80, $errno, $errstr, 30);	
	if (!$fp) {
		echo "$errstr ($errno)<br />\n";
	} else {
		$out = "GET / HTTP/1.1\r\n";
		$out .= "Host: www.example.com\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp, $out);
		fclose($fp);
		header("Location: CallTeacherPage.php?annee=".$annee."&dept=".$dept."&TD=".$TD."&TP=".$TP);
	}

	}
	else{header("Location: CallTeacherPage.php?annee=".$annee."&dept=".$dept."&TD=".$TD."&TP=".$TP);}
}}
	}} }
	
	if ($TD=="NULL" && !($TP=="NULL")){
		echo"bonjour";
	$sql="SELECT * from etudiants where dept='$dept' and annee ='$annee' and TP='$TP';";
	if ($result=$conn->query($sql)){
		if ($result->num_rows==0){
			header('Location: CreateCallTeacherFailed.php');}
		else{
			$sqll = "CREATE TABLE appel".$annee.$dept.$TP."(
				nbet INT NOT NULL ,
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nom VARCHAR(20) NOT NULL,
				prenom VARCHAR(20) NOT NULL )";
if ($result2=$conn->query($sqll)){
	if (!($BoitierisOn=="TDSet")){
	$fp = fsockopen("192.168.1.28",80,$errno,$errstr,30);
	if (!$fp){
		echo "$errstr ($errno)<br />\n";
	}else {
		$out = "GET / HTTP/1.1\r\n";
		$out .= "Host:www.example.com\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp,$out);
		fclose($fp);
		header("Location: CallTeacherPage.php?annee=".$annee."&dept=".$dept."&TD=".$TD."&TP=".$TP);
	}}
	else{header("Location: CallTeacherPage.php?annee=".$annee."&dept=".$dept."&TD=".$TD."&TP=".$TP);}
	}}}}


	
if($TP=="NULL" && !($TD=="NULL")) {
	$sql="SELECT * from etudiants where dept='$dept' and annee ='$annee' and TD='$TD';";
	if ($result=$conn->query($sql)){
		if ($result->num_rows==0){
			header('Location: CreateCallTeacherFailed.php');}
		else{
			$sqll = "CREATE TABLE appel".$annee.$dept.$TD."(
				nbet INT NOT NULL ,
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nom VARCHAR(20) NOT NULL,
				prenom VARCHAR(20) NOT NULL )";
if ($result2=$conn->query($sqll)){
	if (!($BoitierisOn=="TDSet")){
	$fp = fsockopen("192.168.1.28",80,$errno,$errstr,30);
	if (!$fp){
		echo "$errstr ($errno)<br />\n";
	}else {
		$out = "GET / HTTP/1.1\r\n";
		$out .= "Host:www.example.com\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp,$out);
		fclose($fp);
		header("Location: CallTeacherPage.php?annee=".$annee."&dept=".$dept."&TD=".$TD."&TP=".$TP);
	}}
	else{header("Location: CallTeacherPage.php?annee=".$annee."&dept=".$dept."&TD=".$TD."&TP=".$TP);}
}}
	}}




			
		
		
	
	
	
	
		$result->free();
	$result2->free();}
	$conn->close();
?>

</body>
</html>
