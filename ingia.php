<?php

$error=''; // Variable To Store Error Message



if (isset($_POST['submit'])) {


	if (empty($_POST['stimail']) || empty($_POST['rupurupu']) || $_POST['orgaa'] == "Select Organisation") {
		$error = "Organisation, User ID or Password is invalid ";
	}
	else
	{
		
    $jina     = $_POST['stimail'];
		$tamblsho = md5($_POST['rupurupu']);
		$orga     = $_POST['orgaa'];
    $dtt = 1;

		$graphq = parse_ini_file('/etc/cgi_bin.ini');
		$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
		if (!$connection) {
                               		die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
                             	  }

    $sql1 = "SELECT * FROM backendusers WHERE passwd=? AND name=? AND uactive=?";
		$query1 = mysqli_prepare( $connection , $sql1);
   		 mysqli_stmt_bind_param($query1, 'ssi', $tamblsho, $jina, $dtt);
   		 mysqli_stmt_execute($query1);
      mysqli_stmt_store_result($query1);    
		$rows = mysqli_stmt_num_rows($query1);

		if ($rows == 1) {
				      
              $sql2='INSERT INTO backuserlog (busernm) VALUES (?)';
              $query2 = mysqli_prepare($connection, $sql2);
              mysqli_stmt_bind_param($query2, 's', $jina);
              mysqli_stmt_execute($query2);
              
              mysqli_stmt_close($query2);

		 		      session_start();
				      $ckval=$jina;
				      $_SESSION['sod'] = $ckval;
				      $_SESSION['sorga'] = $orga;
              
//setcookie($cknm,$ckval,time() + 3600,'/');
				header("location: index.php");

		} else {
				$error = "User ID or Password is invalid";
		}

	}

} else if(isset($_POST['submit2'])){

	header("location: index.php");

}

?>
