<?php
$tata = $_POST['ioyote'];
$neno = "zae";

$graphq = parse_ini_file('/etc/cgi_bin.ini');
$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
if (!$connection) {
                    echo($neno);
} else {

$tatarray = explode(',', $tata);
$fields = 17;
$mao = count($tatarray) % $fields; 


if ($mao == 0){
  $tatabeba = array_chunk($tatarray,$fields);
  
  
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
	   $value[15] = trim($value[15]," ");
	   $value[16] = trim($value[16]," ");

$value[1] = str_replace("''","'",$value[1]);
$value[3] =str_replace("''","'",$value[3]);
$value[4] =str_replace("''","'",$value[4]);
$value[10] =str_replace("''","'",$value[10]);
$value[11] = str_replace("''","'",$value[11]);
$value[6] = str_replace("''","'",$value[6]);
$value[14] =str_replace("''","'",$value[14]);
$value[15] =str_replace("''","'",$value[15]);

$value[1] = str_replace("~",",",$value[1]);
$value[3] = str_replace("~",",",$value[3]);
$value[4] = str_replace("~",",",$value[4]);
$value[10] =str_replace("~",",",$value[10]);
$value[11] =str_replace("~",",",$value[11]);
$value[6] = str_replace("~",",",$value[6]);
$value[14] =str_replace("~",",",$value[14]);
$value[15] =str_replace("~",",",$value[15]);

$value[1] = htmlspecialchars($value[1]);
$value[3] = htmlspecialchars($value[3]);
$value[4] = htmlspecialchars($value[4]);
$value[10] = htmlspecialchars($value[10]);
$value[11] = htmlspecialchars($value[11]);
$value[6] = htmlspecialchars($value[6]);
$value[14] = htmlspecialchars($value[14]);
$value[15] = htmlspecialchars($value[15]);




      
      
      $sql1 = "SELECT * FROM fielddata WHERE foutid=? AND ftname=?";
      $query1 = mysqli_prepare( $connection , $sql1);
      mysqli_stmt_bind_param($query1, 'ss', $value[0], $value[1]);
      mysqli_stmt_execute($query1);
      mysqli_stmt_store_result($query1);    
      $rows = mysqli_stmt_num_rows($query1);
	  
  	  if($rows > 0 ){
  		    $neno = "pass";	
  		}else{
		                                                                                                                                    
        
         
          $sql2='INSERT INTO fielddata (foutid, ftname, ftcnt,ftiar, ftgar, ftcc, fthab, ftabd, ftown, ftara, ftsettlement, ftcom, ftlat, ftlon,ftpicnm,ftorg,ftcons) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
          $query2 = mysqli_prepare($connection, $sql2);
          mysqli_stmt_bind_param($query2, 'ssssssssssssddsss', $value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10],$value[11],$value[12],$value[13],$value[14],$value[15],$value[16]);
          mysqli_stmt_execute($query2);
          mysqli_stmt_close($query2);
         
		       $neno = "pass";
	  }

	  $neno = "pass";
}



echo ($neno);
}else{
$neno = "Please update the app to the latest version.";
echo ($neno);
}


}
?>
