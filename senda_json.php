<?php

$graphq = parse_ini_file('/etc/cgi_bin.ini');
$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
if (!$connection) {
                    die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
                      }

		
      $sqlsaka="SELECT ftname AS 'SPECIES',
                       ftiar AS 'INFECTED_AREA', 
          					   ftgar AS 'GROSS_INFECTED_AREA', 
          					   ftcc AS 'CANOPY_CLOSURE',
          					   fthab AS 'HABITAT', 
          					   ftabd AS 'ABUNDANCE', 
          					   ftown AS 'AREA_OWNERSHIP', 
          					   ftara AS 'AREA_ACCESSIBILITY',
						  ftsettlement AS 'SETTLEMENT',
                       ftcom AS 'COMMENTS',  
          					   ftlon AS 'LOC_LON', 
          					   ftlat AS 'LOC_LAT',
						   fttym AS 'DATA_TIME', 
          					   fid AS 'LOC_INDEX'
			         FROM fielddata";
			 
	  $query1 = mysqli_query($connection , $sqlsaka);
    
	  $neno = array();
     
   
	  while($row = mysqli_fetch_assoc($query1) ){
		 array_push($neno,$row);
		}

$filo = 'data.json';

file_put_contents($filo, json_encode($neno));




ob_start();
passthru('python doemm.py');
$output1 = ob_get_clean();
file_put_contents("reports.geojson",$output1);



mysqli_close($connection);			
		                                                                                                                               
?>
