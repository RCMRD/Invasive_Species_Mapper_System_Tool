<?php


$graphq = parse_ini_file('/etc/cgi_bin.ini');
		$connection = mysqli_connect($graphq[USQ],$graphq[UPQ],$graphq[PPQ],"SpatiaInvSpc");
		if (!$connection) {
                               		die( $error ="Unable to connect to the database server at this time. Please try later. ". mysqli_error() );
                       }


$sql1 = "SELECT foutid,ftname,ftiar,ftgar,ftcc,fthab,ftabd,ftown,ftara,ftsettlement,ftcom,ftpicnm,fttym,ftlon,ftlat FROM fielddata";
if($query1 = mysqli_query($connection,$sql1)){

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=ISMS_DATA.csv');
    
    $output = fopen('php://output', 'w');
    
    fputcsv($output, array('rptIndex', 'Species','InfestedArea','GrossArea','CanopyClosure','Habitat','Abudance','Owner','AreaAccessibility','Settlement','Comments','MediaName','CollectDate','Latitude','Longitude'));

    while ($row = mysqli_fetch_assoc($query1)){
    	fputcsv($output, $row);
    }    
		
}

mysqli_close($connection);	
		                                                                                                                               
?>
