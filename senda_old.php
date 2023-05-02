<?php
$tata = $_POST['ioyote'];
$neno = "zae";

$graphq = parse_ini_file('/etc/cgi_bin.ini');
		
		$conn = mysql_connect($graphq[USQ],
                        	  $graphq[UPQ],
 							  $graphq[PPQ]);
        if (!$conn) {
             die( $error ="Unable to connect to the database server at this time. Please try later" );
              }
			  
$dbcnx = mysql_select_db("SpatiaInvSpc", $conn);
        if (!$dbcnx) {
               die( $error ="Unable to connect to the database server at this time. Please try later" );
                }else{

$tatarray = explode(',', $tata);
$tatabeba = array_chunk($tatarray,15);

//if (count($tatabeba) == 14 ){
  //  $inserted = array( 'None' );
   // array_splice( $tatabeba, 11, 0, $inserted ); 
//}


//if (count($tatabeba) == 15){

foreach ($tatabeba as $value) {
	
	   $value[0] = trim($value[0]," ");
	   $value[1] = trim($value[1]," ");
	   $value[2] = trim($value[2]," ");
	   $value[3] = trim($value[3]," ");
	   $value[4] = trim($value[4]," ");
	   $value[5] = trim($value[5]," ");
	   $value[6] = trim($value[6]," ");
	   $value[7] = trim($value[7]," ");
	   $value[8] = trim($value[8]," ");
	   $value[9] = trim($value[9]," ");
	   $value[10] = trim($value[10]," ");
	   $value[11] = trim($value[11]," ");
	   $value[12] = trim($value[12]," ");
	   $value[13] = trim($value[13]," ");
	   $value[14] = trim($value[14]," ");

      $sqlsaka='SELECT * FROM fielddata WHERE foutid = "'.$value[0].'" AND ftname = "'.$value[1].'"';
	  $rsltsaka = mysql_query($sqlsaka, $conn);
	  
	  if($row = mysql_fetch_array($rsltsaka) ){
		$neno = "pass";	
		}
	  else{
		                                                                                                                                    
         $sql='INSERT into fielddata (foutid, ftname, ftcnt, ftiar, ftgar, ftcc, fthab, ftabd, ftown, ftara, ftsettlement, ftcom, ftlat, ftlon,ftpicnm) values ("'.$value[0].'","'.$value[1].'","'.$value[2].'","'.$value[3].'","'.$value[4].'","'.$value[5].'","'.$value[6].'","'.$value[7].'","'.$value[8].'","'.$value[9].'","'.$value[10].'","'.$value[11].'","'.$value[12].'","'.$value[13].'","'.$value[14].'")';
         $rslt = mysql_query($sql, $conn);		 
		 $neno = "pass";
	  }

	  $neno = "pass";
}



echo ($neno);
}				
		                                                                                                                               
?>
