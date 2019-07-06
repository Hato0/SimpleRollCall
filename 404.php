<?php

session_start();
$servername = "localhost";
$DBName="BDD";
$username = "root";
$password = "root";

$conn = new mysqli($servername, $username, $password,$DBName);

if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}
$rdmURL = "";
$protocol = strpos($SERVER['$_SERVER_PROTOCOL'],'https')=== FALSE ? 'http':'https';
$host =$_SERVER['HTTP_HOST'];
$script = $_SERVER['SCRIPT_NAME'];
$params = $_SERVER['QUERY_STRING'];
$rdmURL = $_GET['url'];
$testSQL = "or";
if (strpos($rdmURL, $testSQL) !==FALSE){
	header('Location: PageErreur.html');}


$sql = "SELECT * FROM tableURL where adresse='".$rdmURL."';";

$res = $conn->query($sql);

if ($res->num_rows==1){
	echo "OK";
	    $sqll = "DELETE from tableURL WHERE adresse='".$rdmURL."';";
	        $conn->query($sqll);
	     $fp = fsockopen("192.168.1.28", 80, $errno, $errstr, 30);
	        if (!$fp) {
			        echo "$errstr ($errno)<br />\n";
		} else {
			$out = "GET / HTTP/1.1\r\n";
			$out .= "Host: www.example.com\r\n";
			$out .= "Connection: Close\r\n\r\n";
			fwrite($fp, $out);
			fclose($fp);
		}
		$_SESSION['Secure']=$rdmURL;
	        header('Location: Home.php');
}else {header('Location: PageErreur.html');}

?>
