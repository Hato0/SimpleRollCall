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
	//	$nomP[0] = "";
	//	$prenomP[0] = "";

		if ($result =$conn->query($sql)){
			while ($row=$result->fetch_assoc()){
				$row_nom=$row["nom"];
				$row_prenom=$row['prenom'];
				$row_id=$row['id'];
				$nomP[$k] = $row_nom;
				$prenomP[$k] = $row_prenom;
				
				$k = $k +1;			
				
			}
				$result->free();

		}
		
		$resultttt->free();
		$nomA = array();
		$prenomA = array();
	//	$nomA[0] = "";
	//	$prenomA[0] = "";
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
		//	$nomP[0] = "";
		//	$prenomP[0] = "";
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
		//	$nomA[0] = "";
		//	$prenomA[0] = "";
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



			elseif($tp=="NULL"&&!($td=="NULL")){
				$sql="SELECT id,nom,prenom from appel".$annee.$dept.$td;
				$sqll="SELECT etudiants.nom,etudiants.prenom FROM etudiants left join appel".$annee.$dept.$td." on etudiants.nbet=appel".$annee.$dept.$td.".nbet where appel".$annee.$dept.$td.".nbet IS NULL AND etudiants.DEPT ='".$dept."' AND etudiants.ANNEE=".$annee." AND etudiants.TD=".$td.";";

				$sqlll="DROP TABLE appel".$annee.$dept.$td;
				$sqllll="SELECT count(*) as c,nom FROM appel".$annee.$dept.$td;
				$nomP = array();
				$prenomP = array();
				$k = 0;
			//	$nomP[0] = "";
			//	$prenomP[0] = "";
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
			//	$nomA[0] = "";
			//	$prenomA[0] = "";
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
	<fieldset id="titreEnHaut"></fieldset>
	</br>
	<fieldset id="nbPersonnesLa">Nombre de personnes incrites dans l'appel : <?php echo $nbP?></fieldset>
	</br>
	<fieldset id="blocAbs"><legend><fieldset id="title">Eleves Absents</fieldset></legend><form method="POST"  id="listeAbs2"></form></fieldset>
	</br>
	<fieldset id="blocRtd"><legend><fieldset id="title">Eleves en retard</fieldset></legend><form method="POST" action="term.php" id = "listeRtd"></form></fieldset>
	</br>
	<fieldset id="blocPrs"><legend><fieldset id="title">Eleves Présents</fieldset></legend><form method="POST" action="term.php" id = "listePrs2"></form></fieldset>

	</br><button type="submit" onclick="Retard()">Retard</button>   <button type="submit" onclick="Absent()">Absent</button>   <button type="submit" onclick="Present()">Présent</button>

</div>


				<script type="text/javascript">
				function listeAbs(){
					var k=0;
		var listeNomAbsents= <?php echo json_encode($nomA) ?>;
		var listePrenomAbsents= <?php echo json_encode($prenomA) ?>;

		for(k=0;k<listeNomAbsents.length;k++){

				
		//	document.getElementById("listeAbs").innerHTML += "<li>"+listeNomAbsents[k]+" "+listePrenomAbsents[k] +"</li>";
			
			document.getElementById('listeAbs2').innerHTML += '<div class="Absent" id="IDAbs'+k+'"><input type="checkbox" id="Abs'+k+'"  name=Abs'+k+' value="'+listeNomAbsents[k]+' '+listePrenomAbsents[k]+'">'+listeNomAbsents[k]+' '+listePrenomAbsents[k]+'</div>';
			console.log();
		}	
	//	document.getElementById('listeAbs2').innerHTML += '</br><div><button type="submit">Retard</button></div></br><div><button type="submit">Absent</button></div>';

		if (listeNomAbsents.length==0){
				document.getElementById("blocAbs").remove();
			}
		
	}

	function listePrs(){
		var k=0;
		var listeNomPresents= <?php echo json_encode($nomP) ?>;
		var listePrenomPresents= <?php echo json_encode($prenomP) ?>;
		for(k=0;k<listeNomPresents.length;k++){
			console.log(listeNomPresents.length);

				
			document.getElementById('listePrs2').innerHTML += '<div class="Present" id="IDPrs'+k+'"><input type="checkbox" id="Prs'+k+'" name=Prs'+k+' value="'+listeNomPresents[k]+' '+listePrenomPresents[k] +'">'+listeNomPresents[k]+' '+listePrenomPresents[k] +'</div>';
			
		}

	//document.getElementById('listePrs2').innerHTML += '</br><div><button type="submit">Retard</button></div></br><div><button type="submit">Absent</button></div>';
	/*	if (listeNomPresents.length==0){
				document.getElementById("blocPrs").remove();
			
	}*/

	}
	function  Present(){
		var k=0;
		var j=0;
		var p=0;
		var o=0;
		var m=0;
		var i=0;
		var a=0;
		var listePrs=[];
		var listeAbs=[];
		var listeRtd=[];
		var kk=0;
		var oo=0;
		var r=0;

		while(document.getElementById("IDAbs"+k+"") !== null){
			if (document.getElementById('Abs'+k+'').checked==true){
				listePrs[p]=document.getElementById("Abs"+k).value;
				p++;

				var formm = document.getElementById("listeAbs2");
				var element = document.getElementById("IDAbs"+k);
				var child = document.getElementById("Abs"+k);
				element.removeChild(child);
				formm.removeChild(element);


				//document.getElementById("IDAbs"+k).innerHTML="";
			}
			else{
				listeAbs[m]=document.getElementById("Abs"+k).value;
			//	console.log(listeAbs[m]);

				var formm = document.getElementById("listeAbs2");
				var element = document.getElementById("IDAbs"+k);
				var child = document.getElementById("Abs"+k);
				element.removeChild(child);
				formm.removeChild(element);

				/*var element = document.getElementById("IDAbs"+k);
				var child = document.getElementById("Abs"+k);
				element.removeChild(child);*/

			//	document.getElementById("Abs"+k).remove();
		//		document.getElementById("IDAbs"+k).innerHTML="";
		//		console.log(document.getElementById("Abs"+k).checked);
				m++;
			}
			k++;}
		
		//console.log(m);

		for (o=0;o<m;o++){
			document.getElementById('listeAbs2').innerHTML += '<div class="Absent" id="IDAbs'+o+'"><input type="checkbox" id="Abs'+o+'" name=Abs'+o+' value="'+listeAbs[o]+'">'+listeAbs[o]+'</div>';
	//		console.log();
		}


		while(document.getElementById("IDRtd"+kk+"") !== null){
			if (document.getElementById('Rtd'+kk+'').checked==true){
				listePrs[p]=document.getElementById("Rtd"+kk).value;
				p++;

				var formm = document.getElementById("listeRtd");
				var element = document.getElementById("IDRtd"+kk);
				var child = document.getElementById("Rtd"+kk);
				element.removeChild(child);
				formm.removeChild(element);}
			else{
				listeRtd[r]=document.getElementById("Rtd"+kk).value;
				r++;

				var formm = document.getElementById("listeRtd");
				var element = document.getElementById("IDRtd"+kk);
				var child = document.getElementById("Rtd"+kk);
				element.removeChild(child);
				formm.removeChild(element);
		
			}
			kk++;
		}


		for(oo=0;oo<r;oo++){
			document.getElementById('listeRtd').innerHTML += '<div class="Retard" id="IDRtd'+oo+'"><input type="checkbox" id="Rtd'+oo+'" name=Rtd'+oo+' value="'+listeRtd[oo]+'">'+listeRtd[oo]+'</div>';
		}




		while(document.getElementById("IDPrs"+a) !== null){
			a++;
		}
		for (i=a;i<a+p;i++){
//			console.log(listePrs[i-a]);
			document.getElementById('listePrs2').innerHTML += '<div class="Present" id="IDPrs'+i+'"><input type="checkbox" id="Prs'+i+'" name=Prs'+i+' value="'+listePrs[i-a]+'">'+listePrs[i-a]+'</div>';
			
		}
		document.getElementById("nbPersonnesLa").innerHTML = "Nombre de personnes incrites dans l'appel : "+(p+a+r);
	}



	function Absent(){
		var k=0;
		var j=0;
		var p=0;
		var o=0;
		var m=0;
		var i=0;
		var a=0;
		var listePrs=[];
		var listeAbs=[];
		var listeRtd=[];
		var kk=0;
		var oo=0;
		var r=0;

		while(document.getElementById("IDPrs"+k+"") !== null){
			if (document.getElementById('Prs'+k+'').checked==true){
				listeAbs[p]=document.getElementById("Prs"+k).value;
				p++;

				var formm = document.getElementById("listePrs2");
				var element = document.getElementById("IDPrs"+k);
				var child = document.getElementById("Prs"+k);
				element.removeChild(child);
				formm.removeChild(element);


				//document.getElementById("IDAbs"+k).innerHTML="";
			}
			else{
				listePrs[m]=document.getElementById("Prs"+k).value;
			//	console.log(listeAbs[m]);

				var formm = document.getElementById("listePrs2");
				var element = document.getElementById("IDPrs"+k);
				var child = document.getElementById("Prs"+k);
				element.removeChild(child);
				formm.removeChild(element);

				/*var element = document.getElementById("IDAbs"+k);
				var child = document.getElementById("Abs"+k);
				element.removeChild(child);*/

			//	document.getElementById("Abs"+k).remove();
		//		document.getElementById("IDAbs"+k).innerHTML="";
		//		console.log(document.getElementById("Abs"+k).checked);
				m++;
			}
			k++;}
		
		//console.log(m);

		for (o=0;o<m;o++){
			document.getElementById('listePrs2').innerHTML += '<div class="Present" id="IDPrs'+o+'"><input type="checkbox" id="Prs'+o+'" name=Prs'+o+' value="'+listePrs[o]+'">'+listePrs[o]+'</div>';
	//		console.log();
		}


		while(document.getElementById("IDRtd"+kk+"") !== null){
			if (document.getElementById('Rtd'+kk+'').checked==true){
				listeAbs[p]=document.getElementById("Rtd"+kk).value;
				p++;

				var formm = document.getElementById("listeRtd");
				var element = document.getElementById("IDRtd"+kk);
				var child = document.getElementById("Rtd"+kk);
				element.removeChild(child);
				formm.removeChild(element);}
			else{
				listeRtd[r]=document.getElementById("Rtd"+kk).value;
				r++;

				var formm = document.getElementById("listeRtd");
				var element = document.getElementById("IDRtd"+kk);
				var child = document.getElementById("Rtd"+kk);
				element.removeChild(child);
				formm.removeChild(element);
		
			}
			kk++;
		}


		for(oo=0;oo<r;oo++){
			document.getElementById('listeRtd').innerHTML += '<div class="Retard" id="IDRtd'+oo+'"><input type="checkbox" id="Rtd'+oo+'" name=Rtd'+oo+' value="'+listeRtd[oo]+'">'+listeRtd[oo]+'</div>';
		}




		while(document.getElementById("IDAbs"+a) !== null){
			a++;
		}
		for (i=a;i<a+p;i++){
			console.log(listeAbs[i-a]);
			document.getElementById('listeAbs2').innerHTML += '<div class="Absent" id="IDAbs'+i+'"><input type="checkbox" id="Abs'+i+'" name=Abs'+i+' value="'+listeAbs[i-a]+'">'+listeAbs[i-a]+'</div>';
			
		}
		document.getElementById("nbPersonnesLa").innerHTML = "Nombre de personnes incrites dans l'appel : "+(m+r);

	}



	function Retard(){
		var k=0;
		var listeRtd=[];
		var listeAbs=[];
		var listePrs=[];
		var r=0;
		var m=0;
		var o=0;
		var i=0;
		var a=0;
		var kk=0;
		var p=0;
		var oo=0;

		while(document.getElementById("IDAbs"+k) !== null){
			if (document.getElementById("Abs"+k).checked==true){
				listeRtd[r]=document.getElementById("Abs"+k).value;
				r++;

				var formm = document.getElementById("listeAbs2");
				var element = document.getElementById("IDAbs"+k);
				var child = document.getElementById("Abs"+k);
				element.removeChild(child);
				formm.removeChild(element);


				//	document.getElementById("Abs"+k).remove();
		//		document.getElementById("IDAbs"+k).innerHTML="";
			}
			else{
				listeAbs[m]=document.getElementById("Abs"+k).value;

				var formm = document.getElementById("listeAbs2");
				var element = document.getElementById("IDAbs"+k);
				var child = document.getElementById("Abs"+k);
				element.removeChild(child);
				formm.removeChild(element);


				//document.getElementById("Abs"+k).remove();
				//document.getElementById("IDAbs"+k).innerHTML="";
				m++;}
			k++;}

		for (o=0;o<m;o++){
			document.getElementById('listeAbs2').innerHTML += '<div class="Absent" id="IDAbs'+o+'"><input type="checkbox" id="Abs'+o+'" name=Abs'+o+' value="'+listeAbs[o]+'">'+listeAbs[o]+'</div>';
		//	console.log(o);		
		}



		while(document.getElementById("IDPrs"+kk) !== null){
		//	console.log(document.getElementById("Prs"+kk));
			if (document.getElementById("Prs"+kk).checked==true){
				listeRtd[r]=document.getElementById("Prs"+kk).value;
				r++;

				var formm = document.getElementById("listePrs2");
				var element = document.getElementById("IDPrs"+kk);
				var child = document.getElementById("Prs"+kk);
				element.removeChild(child);
				formm.removeChild(element);


				//document.getElementById("Prs"+kk).remove();
				//document.getElementById("IDPrs"+kk).innerHTML="";
			}
			else{
				listePrs[p]=document.getElementById("Prs"+kk).value;
				
				var formm = document.getElementById("listePrs2");
				var element = document.getElementById("IDPrs"+kk);
				var child = document.getElementById("Prs"+kk);
				element.removeChild(child);
				formm.removeChild(element);

				
			//	document.getElementById("Prs"+kk).remove();
			//	document.getElementById("IDPrs"+kk).innerHTML="";
				p++;}
			kk++;}

		for (oo=0;oo<p;oo++){
			document.getElementById('listePrs2').innerHTML += '<div class="Present" id="IDPrs'+oo+'"><input type="checkbox" id="Prs'+oo+'" name=Prs'+oo+' value="'+listePrs[oo]+'">'+listePrs[oo]+'</div>';
		}


		while(document.getElementById('IDRtd'+a) !== null){
			a++;
		}

		for (i=a;i<a+r;i++){
		//	console.log(i);
			document.getElementById('listeRtd').innerHTML += '<div class="Retard" id="IDRtd'+i+'"><input type="checkbox" id="Rtd'+i+'" name=Rtd'+i+' value="'+listeRtd[i-a]+'">'+listeRtd[i-a]+'</div>';
//			console.log(listeRtd[i-a]);
		}

	document.getElementById("nbPersonnesLa").innerHTML = "Nombre de personnes incrites dans l'appel : "+(p+a+r);


		}
	function titre(){
		var annee= <?php echo json_encode($annee) ?>;

		var dept= <?php echo json_encode($dept) ?>;
		var td= <?php echo json_encode($td) ?>;
		var tp= <?php echo json_encode($tp) ?>;
		var titretotal = document.getElementById("titreEnHaut");
		titretotal.innerHTML += "Resultat de l'appel de la classe "+annee+"A "+dept;
		if (td!= "NULL"){
			titretotal.innerHTML += " TD"+td;
		}
		else if(tp!= "NULL"){
			titretotal.innerHTML += " TP"+tp;
		}



	}	
	titre();
	listePrs();
	listeAbs();	
		
</script>

<footer>Copyright 2019 Antoine Poupeney, Maxence Poisson, François Guilloux, Timothée Cao Van Tuat, Thibaut Lompech</footer>

</body>
</html>
