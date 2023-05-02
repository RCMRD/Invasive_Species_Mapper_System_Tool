<?php
/*$nani = $_POST['uname'];
$simu = $_POST['usimu'];
$mail = $_POST['mail'];
$pswd = $_POST['pswd'];
$ulat = $_POST['say'];
$ulon = $_POST['sax'];
*/

$mail = $_POST['mail'];
$pswd = MD5($_POST['pswd']);


$cheka = "imereach";
$sw = 1;

$graphq = parse_ini_file('/etc/cgi_bin.ini');
$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
if (!$connection) {
       	die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
}else{


 	$sql2 = "SELECT * FROM appuser WHERE usapwd='$pswd' AND usamail='$mail' AND usaaproved='$sw'";
        $rslt2 = mysqli_query($connection,$sql2);

                if ($row2 = mysqli_fetch_array($rslt2)){
                	$sql='INSERT into userlog (logname, logfon, logmail, loglat, loglon) values ("'.$nani.'","'.$simu.'","'.$mail.'","'.$ulat.'","'.$ulon.'","'.$usx.'","'.$usy.'","'.$pani.'")';
        		$cheka = $row2['usaname'].",".$row2['usafon'].",".$row2['usactry'].",".$row2['usamail'].",".$row2['usapwd'];
			echo($cheka);
		}else{
			echo("issue_1");
		}

}

//echo("aaaaaaaaaaaaaaaa");

?>
