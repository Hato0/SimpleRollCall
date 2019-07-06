<!DOCTYPE html>

<html>
<head>
	<title>Fin d'appel</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="style6.css" type="text/css"/>

</head>

<body>
<?php

$servername="localhost";
$dbname="BDD";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
}

$dept=$_GET['dept'];
$annee=$_GET['annee'];
$tp=$_GET['TP'];
$td=$_GET['TD'];
if ($td=="NULL"){
	if($tp=="NULL"){
		$sql="SELECT id,nom,prenom from appel".$annee.$dept;
		$sqll="SELECT etudiants.nom,etudiants.prenom FROM etudiants left join appel".$annee.$dept." on etudiants.nbet=appel".$annee.$dept.".nbet where appel".$annee.$dept.".nbet IS NULL AND etudiants.DEPT ='".$dept."' AND etudiants.ANNEE=".$annee;

		$sqlll="DROP TABLE appel".$annee.$dept;
		$sqllll="SELECT count(*) as c,nom FROM appel".$annee.$dept;
//		echo 'Appel de la classe '.$dept.' '.$annee.'A</br></br>';

		//	echo 'ELEVES PRESENTS:';
		$nbP = 0;
		if ($resultttt=$conn->query($sqllll)){
			while ($rowwww=$resultttt->fetch_assoc()){
				$row_nb=$rowwww['c'];
						//						echo $row_nb;
						$nbP = $row_nb;
			}
		}
		$resultttt->free();
		$nomP = array();
		$prenomP = array();
		$k = 0;
		$nomP[0] = "";
		$prenomP[0] = "";

		if ($result =$conn->query($sql)){
			while ($row=$result->fetch_assoc()){
				$row_nom=$row["nom"];
				$row_prenom=$row['prenom'];
				$row_id=$row['id'];
				$nomP[$k] = $row_nom;
				$prenomP[$k] = $row_prenom;
				$k = $k +1;			


				$result->free();}
		}

		$resultttt->free();
		$nomA = array();
		$prenomA = array();
		$nomA[0] = "";
		$prenomA[0] = "";
		$k = 0;

		if ($resultt=$conn->query($sqll)){
			//	echo '</br></br></br></br>ELEVES ABSENTS</br></br>'; 
			while ($roww=$resultt->fetch_assoc()){
				$roww_nom=$roww["nom"];
				$roww_prenom=$roww["prenom"];
				$nomA[$k] = $roww_nom;
				$prenomA[$k] = $roww_prenom;	
				$k = $k +1;			



			}
			$resultt->free();
		}


		if ($drop=$conn->query($sqlll)){
			//	echo "</br></br></br> Fin de l'appel";
		}
	}}

		if ($td=="NULL"&&!($tp=="NULL")){

			$sql="SELECT id,nom,prenom from appel".$annee.$dept.$tp;
			$sqll="SELECT etudiants.nom,etudiants.prenom FROM etudiants left join appel".$annee.$dept.$tp." on etudiants.nbet=appel".$annee.$dept.$tp.".nbet where appel".$annee.$dept.$tp.".nbet IS NULL AND etudiants.DEPT ='".$dept."' AND etudiants.ANNEE=".$annee." AND etudiants.TP=".$tp.";";

			$sqlll="DROP TABLE appel".$annee.$dept.$tp;
			$sqllll="SELECT count(*) as c,nom FROM appel".$annee.$dept.$tp;

			//	echo 'ELEVES PRESENTS: ';
			$nomP = array();
			$prenomP = array();
			$k = 0;
			$nomP[0] = "";
			$prenomP[0] = "";
			$nbP = 0;
			if ($resultttt=$conn->query($sqllll)){
				while ($rowwww=$resultttt->fetch_assoc()){
					$row_nb=$rowwww['c'];

						//						echo $row_nb;
						$nbP = $row_nb;


				}
			}
			$resultttt->free();


			if ($result =$conn->query($sql)){
				while ($row=$result->fetch_assoc()){
					$row_nom=$row["nom"];
					$row_prenom=$row['prenom'];
					$row_id=$row['id'];
					$nomP[$k] = $row_nom;
					$prenomP[$k] = $row_prenom;
					$k = $k +1;	


				}
				$result->free();}


			$nomA = array();
			$prenomA = array();
			$nomA[0] = "";
			$prenomA[0] = "";
			$k = 0;
			if ($resultt=$conn->query($sqll)){
			//	echo '</br></br></br></br>ELEVES ABSENTS</br></br>'; 
				while ($roww=$resultt->fetch_assoc()){
					$roww_nom=$roww["nom"];
					$roww_prenom=$roww["prenom"];

					$nomA[$k] = $roww_nom;
					$prenomA[$k] = $roww_prenom;	
					$k = $k +1;	


				}
				$resultt->free();
			}


			if ($drop=$conn->query($sqlll)){
		//		echo "</br></br></br> Fin de l'appel";
			}}



			elseif($tp=="NULL"&&!($td="NULL")){
				$sql="SELECT id,nom,prenom from appel".$annee.$dept.$td;
				$sqll="SELECT etudiants.nom,etudiants.prenom FROM etudiants left join appel".$annee.$dept.$td." on etudiants.nbet=appel".$annee.$dept.$td.".nbet where appel".$annee.$dept.$td.".nbet IS NULL AND etudiants.DEPT ='".$dept."' AND etudiants.ANNEE=".$annee." AND etudiants.TD=".$td.";";

				$sqlll="DROP TABLE appel".$annee.$dept.$td;
				$sqllll="SELECT count(*) as c,nom FROM appel".$annee.$dept.$td;
				$nomP = array();
				$prenomP = array();
				$k = 0;
				$nomP[0] = "";
				$prenomP[0] = "";
			//	echo 'ELEVES PRESNTS: ';
				$nbP = 0;
				if ($resultttt=$conn->query($sqllll)){
					while ($rowwww=$resultttt->fetch_assoc()){
						$row_nb=$rowwww['c'];
						//						echo $row_nb;
						$nbP = $row_nb;
					
					}
				}
				$resultttt->free();


				if ($result =$conn->query($sql)){
					while ($row=$result->fetch_assoc()){
						$row_nom=$row["nom"];
						$row_prenom=$row['prenom'];
						$row_id=$row['id'];

						$nomP[$k] = $row_nom;
						$prenomP[$k] = $row_prenom;
						$k = $k +1;	


					}
					$result->free();}
				$nomA = array();
				$prenomA = array();
				$nomA[0] = "";
				$prenomA[0] = "";
				$k = 0;
				if ($resultt=$conn->query($sqll)){
				//	echo '</br></br></br></br>ELEVES ABSENTS</br></br>'; 
					while ($roww=$resultt->fetch_assoc()){
						$roww_nom=$roww["nom"];
						$roww_prenom=$roww["prenom"];
						$nomA[$k] = $roww_nom;
						$prenomA[$k] = $roww_prenom;	
						$k = $k +1;	
					}
					$resultt->free();
				}


				if ($drop=$conn->query($sqlll)){
				//	echo "</br></br></br> Fin de l'appel";
				}}


					$conn->close();


?>



<div id="formu">
	<fieldset id="basic">Résultat de l'appel de la classe <?php echo $annee ?>A <?php echo $dept ?></fieldset>
	</br>
	<fieldset id="basic">Nombre de personnes incrites dans l'appel : <?php echo $nbP?></fieldset>
	</br>
	<fieldset id="blocAbs"><legend><fieldset id="title">Eleves Absents</fieldset></legend><ul id = "listeAbs"><ul></fieldset>
	</br>
	<fieldset id="blocPrs"><legend><fieldset id="title">Eleves Présents</fieldset></legend><ul id = "listePrs"><ul></fieldset>


</div>


<script type="text/javascript">
	function listeAbs(){
		var k=0;
		var listeNomAbsents= <?php echo json_encode($nomA) ?>;
		var listePrenomAbsents= <?php echo json_encode($prenomA) ?>;

		for(k=0;k<listeNomAbsents.length;k++){

				
			document.getElementById('listeAbs').innerHTML += "<li>"+listeNomAbsents[k]+" "+listePrenomAbsents[k] +"</li>";
			
		}

		if (listeNomAbsents.length==1){
			if(listeNomAbsents[0]==""){
				document.getElementById("blocAbs").remove();
			}
		}

	}

	function listePrs(){
		var k=0;
		var listeNomPresents= <?php echo json_encode($nomP) ?>;
		var listePrenomPresents= <?php echo json_encode($prenomP) ?>;

		for(k=0;k<listeNomPresents.length;k++){

				
			document.getElementById('listePrs').innerHTML += "<li>"+listeNomPresents[k]+" "+listePrenomPresents[k] +"</li>";
			
		}
		if (listeNomPresents.length==1){
			if(listeNomPresents[0]==""){
				document.getElementById("blocPrs").remove();
			}
		}

	}	
	listePrs();
	listeAbs();	
		
</script>

<footer>Copyright 2019 Antoine Poupeney, Maxence Poisson, François Guilloux, Timotée Cao Van Tuat, Thibaut Lompech</footer>

</body>
</html>
