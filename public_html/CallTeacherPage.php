<html>
	<head>
		<title>Appel en cours</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="style4.css" type="text/css" /> 
	</head>
	<body>
		<h1><orange>
			L'appel est en cours...
			</orange>
		</h1>
		<div>


			<div id="yallah">Nombre d'élèves :

<?php


$servename="localhost";
$dbname="BDD";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password,$dbname);
$dept=$_GET['dept'];
$annee=$_GET['annee'];
$TD=$_GET['TD'];
$TP=$_GET['TP'];

if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

if ($TD=="NULL"){
	if($TP=='NULL'){
		$sqll="SELECT count(*) as c,nom from etudiants where etudiants.dept='".$dept."' and etudiants.annee=".$annee; 
		if ($resu=$conn->query($sqll)){
			while ($roww=$resu->fetch_assoc()){
				$row_nbtot=$roww['c'];
				echo $row_nbtot;
				}}}

		else{
			$sqll="SELECT count(*) as c,nom from etudiants where etudiants.dept='".$dept."'and etudiants.annee=$annee and etudiants.TP=$TP;";
						if ($resu=$conn->query($sqll)){
							while ($roww=$resu->fetch_assoc()){
								$row_nbtot=$roww['c'];
								echo $row_nbtot;
								}}}


}

		else{

			$sqll="SELECT count(*) as c,nom from etudiants where etudiants.dept='".$dept."' and etudiants.annee=$annee and etudiants.TD=$TD;";

			if ($resu=$conn->query($sqll)){
				while ($roww=$resu->fetch_assoc()){
					$row_nbtot=$roww['c'];
					echo $row_nbtot;
					}}}

			
$conn->close();


?>



</div>
			<div id ="yallah">Nombre d'élèves présents :


<?php


$servername="localhost";
$dbname="BDD";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password,$dbname);
$dept=$_GET['dept'];
$annee=$_GET['annee'];

if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);

}

if ($TP=='NULL'){
	if ($TD=='NULL'){
		$sql="SELECT count(*) as c,nom FROM appel".$annee.$dept;



		if ($result=$conn->query($sql)){
			while ($row=$result->fetch_assoc()){
				$row_id=$row["c"];
				$row_sensor=$row["nom"];				
				echo $row_id;}}
				$result->free();}


		else {
			$sql="SELECT count(*) as c,nom FROM appel".$annee.$dept.$TD;
			if ($result=$conn->query($sql)){
				while ($row=$result->fetch_assoc()){
					$row_nb=$row['c'];
					echo $row_nb;
					$result->free();}}}




}

else{
	$sql="SELECT count(*) as c,nom FROM appel".$annee.$dept.$TP;
	if ($result=$conn->query($sql)){
		while ($row=$result->fetch_assoc()){
			$row_nb=$row['c'];
			echo $row_nb;}}
			$result->free();}




$conn->close();

?>


		</div>
		</div>
		</br>
		</br>


		<form>	<input type="button" name="nom" value="Terminer l'appel" onclick="window.location.replace('terminer.php?annee=<?php echo $annee?>&dept=<?php echo $dept?>&TD=<?php echo $TD?>&TP=<?php echo $TP?>')"></form>


<?php /*
function redir(){
	header("terminer.php?annee=".$annee."&dept=".$dept);}*/?>

		</br>
		</br>
		</br>
		</br>
		<footer>&copy; Copyright 2019 Antoine Poupeney, Maxence Poisson, Francois Guilloux, Timothee Cao Van Tuat, Lompech Thibaut</footer>
	</body>            
</html>
