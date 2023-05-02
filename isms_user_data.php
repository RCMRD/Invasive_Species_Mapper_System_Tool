<?php
$nani = $_POST['nani'];
$simu = $_POST['simu'];
$combi = $nani."_".$simu;
$param = "%{$combi}%";

$graphq = parse_ini_file('/etc/cgi_bin.ini');
		$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
		if (!$connection) {
                               		die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
                       }



$sql1 = "SELECT ftname,ftiar,ftgar,ftcc,fthab,ftabd,ftown,ftara,ftsettlement,ftcom,ftpicnm,fttym,ftlat,ftlon FROM fielddata WHERE foutid LIKE ?";

$query1 = mysqli_prepare($connection, $sql1);
mysqli_stmt_bind_param($query1, 's', $param);
mysqli_stmt_execute($query1);
mysqli_stmt_store_result($query1);    
$rows = mysqli_stmt_num_rows($query1);
	  
if($rows > 0 ){

  mysqli_free_result($query1);
  mysqli_stmt_close($query1);
  
  $query2 = mysqli_query($connection , $sql1);
    
  $output = fopen('geo_userdata.csv', 'w');

fputcsv($output, array('SPECIES','INFESTED_AREA','GROSS_AREA','CANOPY_CLOSURE','HABITAT','ABUDANCE','OWNERSHIP','AREA_ACCESSIBILITY','SETTLEMENT','COMMENTS','IMAGE_NAME','REPORT_TIME','LONGITUDE','LATITUDE'));

while ($row = mysqli_fetch_assoc($query2)){
        fputcsv($output, $row);
}

fclose($output);

system("/var/www/html/invspec/geo_converter.sh  2>&1",$shida);

$fyl = file_get_contents('geo_userdata.geojson', true);

mysqli_free_result($query2);
mysqli_close($link);

echo $fyl;



}else{
echo "hakana";
mysqli_close($link);
}

		                                                                                                                               
?>

