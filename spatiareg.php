<?php
$nani = $_POST['nani'];
$simu = $_POST['simu'];
$wapi = $_POST['wapi'];
$pepe = $_POST['pepe'];
$pasd = md5($_POST['pasd']);
$lato = $_POST['lato'];
$lono = $_POST['lono'];


$cheka = "imereach";


function kunashida($q){
    return (!isset($q) || trim($q)==='' || empty($q) || !$q);
}




$graphq = parse_ini_file('/etc/cgi_bin.ini');
$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
if (!$connection) {
                        die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
                  }


if (kunashida($nani)|| kunashida($simu) || kunashida($wapi) || kunashida($pepe) || kunashida($pasd)){
$cheka = "imereach";
echo ($cheka);

}else{
	    
    $sql2 = "SELECT * FROM appuser WHERE usaname=? AND usapwd=? AND usamail=? AND usafon=? AND usactry=?";
		$query2 = mysqli_prepare( $connection , $sql2);
   		 mysqli_stmt_bind_param($query2, 'sssss', $nani, $pasd, $pepe, $simu, $wapi);
   		 mysqli_stmt_execute($query2);
      mysqli_stmt_store_result($query2);    
		$rows = mysqli_stmt_num_rows($query2);
		
		if ($rows > 0){
		   $cheka = "steve";
		}else{
		
        
        $sql1='INSERT INTO appuser (usaname,usafon,usactry,usamail,usapwd,usalat,usalon) VALUES (?,?,?,?,?,?,?)';
        $query1 = mysqli_prepare($connection, $sql1);
        mysqli_stmt_bind_param($query1, 'sssssdd', $nani,$simu,$wapi,$pepe,$pasd,$lato,$lono);
        mysqli_stmt_execute($query1);
        
        mysqli_stmt_close($query1);
        
        
        
        $cheka = "steve";
		}
		      
echo ($cheka);
}


?>
