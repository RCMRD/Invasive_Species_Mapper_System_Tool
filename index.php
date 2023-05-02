<?php
session_start();
?>

<!doctype html>
<html>

<head>
	<meta http-equiv="cache-control" content="no-store">
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZVo7h5s4Za-QmX0cVG722DZZsyuqwEXE">
	</script>

	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

	<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js" async>
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
	<link rel="shortcut icon" href="saveme.png" type="image/x-icon" />
	<meta charset="UTF-8">



	<title>INVASIVE SPECIES SYSTEM</title>

	<link rel="stylesheet" href="alldis.css" type="text/css" />
	<link rel="stylesheet" href="stylemu.css" type="text/css">
	</link>
	<link rel="stylesheet" href="teret.css" type="text/css">
	</link>
	<link rel="stylesheet" href="chk.css" type="text/css" />
	<script src="CDN_7tw9ueldh889290skld0fkj.js"></script>

</head>

<body>

	<div id="map-canvas"></div>


	<div id="search" style="position: fixed">
		<form class="geocode" action="whuu.php" method="POST" id="saak">
			<select name="tafta">
				<option value="dflt">All Species</option>
				<option value="Acacia Reficiens">Acacia Reficiens</option>
				<option value="Opuntia Species">Opuntia Species</option>
				<option value="Lantana Camara">Lantana Camara</option>
				<option value="Prosopis Species">Prosopis Species</option>
				<option value="Water Hyacinth">Water Hyacinth </option>
				<option value="Chromolaena Odorata"> Chromolaena Odorata </option>
				<option value="Opuntia Stricta Opuntia"> Stricta </option>
				<option value="Parthenium Hysterophorus"> Parthenium Hysterophorus </option>
				<option value="Prosopis Juliflora Species"> Prosopis Juliflora Species </option>

				<option value="Tithonia Diversifolia Species"> Tithonia Diversifolia Species</option>
			</select>
			<input type='submit' name="stata" />
			<div id='geocode-error'></div>
		</form>
	</div>

	<ul id="css3menu0" class="topmenu" style="height:48px;line-height:48px;z-index:430">
		<li class="toproot" style="width:113px">
			<a href="#" style="height:48px;line-height:48px;"> <span><img src="saveme.png" alt="Spatia" style="height:48px;line-height:48px;" /></span></a>
			<ul style="width:113px">
				<li><a href="login.php">Sign In</a></li>
				<li onclick="loga()"><a href="#">Download Data</a></li>
				<li><a href="nondoke.php">Log Out</a></li>
			</ul>
		</li>
	</ul>

	<script src="VVN_ad22884894885.js"></script>

	<div id='ppkva' style="display:none;background-color:rgba(0,0,0,.1);overflow:auto;position:fixed;top:0px;left:0px;bottom:0px;width:100%;index:99;">
		<div id='pp' style="display:none;"></div>
		<div id='ppi' style="display:none;"></div>
	</div>

	<div id="alertz">


		<div id="eda">
			<h3> INVASIVE SPECIES DATA </h3>
		</div>
		<div id="abebae">

			<?php


			$graphq = parse_ini_file('/etc/cgi_bin.ini');
			$connection = mysqli_connect($graphq[USQ], $graphq[UPQ], $graphq[PPQ], "SpatiaInvSpc");
			if (!$connection) {
				die($error = "Unable to connect to the database server at this time. Please try later. " . mysqli_error());
			}

			if (isset($_SESSION['sod'])) {
				$ninani = $_SESSION['sod'];
				$tty = $_COOKIE['sod'];
				$regd = "poa";
				echo "<script type='text/javascript'>", "ggtt('$regd');", "</script>";
			} else {
				$ninani = "hkn";
			}


			/* 
		  if (isset($_COOKIE['cssd'])){
			 $val1 = $_COOKIE['cssd'];
			  $cssd = $val1;
		  } */

			/*if (isset($_COOKIE['siid'])){
			 $val2 = $_COOKIE['siid'];
			 $siid = $val2;
		  }
		  
		  if (isset($_COOKIE['feid'])){
			  $val3 = $_COOKIE['feid'];
			 $feid = $val3;
		  }
		  
		  if (isset($_COOKIE['fcid'])){
			  $val4 = $_COOKIE['fcid'];
			  $fcid = $val4;
			}*/

			// echo "<script type='text/javascript'>","piga('$sqlw','$siid','$feid','$fcid');","</script>";


			if (isset($_SESSION['fcha'])) {

				$svmst = $_SESSION['fcha'];

				if ($svmst == "dflt") {

					if (isset($_COOKIE['cssd'])) {
						$sql = "SELECT * FROM fielddata WHERE ftcc = '$cssd' ORDER BY fttym DESC";
					}/*else if (isset($_COOKIE['siid'])){
				$sql = "SELECT * FROM fielddata WHERE ftsi =  '$siid' ORDER BY fttym DESC";
				} else if (isset($_COOKIE['feid'])){
				$sql = "SELECT * FROM fielddata WHERE ftfe = '$feid' ORDER BY fttym DESC";
				} else if (isset($_COOKIE['fcid'])) {
				$sql = "SELECT * FROM fielddata WHERE  ftfc =  '$fcid' ORDER BY fttym DESC";	
				}*/ else {
						$sql = "SELECT * FROM fielddata ORDER BY fttym DESC";
					}

					$rslt = mysqli_query($connection, $sql);




					$sqlaa = "SELECT COUNT(*) FROM fielddata WHERE ftcc='Complete'";
					$sqlab = "SELECT COUNT(*) FROM fielddata WHERE ftcc='Incomplete'";
					/*$sqlac = "SELECT COUNT(*) FROM fielddata WHERE ftsi='Complete'";
			$sqlad = "SELECT COUNT(*) FROM fielddata WHERE ftsi='Incomplete'";
			$sqlae = "SELECT COUNT(*) FROM fielddata WHERE ftfe='Complete'";
			$sqlaf = "SELECT COUNT(*) FROM fielddata WHERE ftfe='Incomplete'";
			$sqlag = "SELECT COUNT(*) FROM fielddata WHERE ftfc='Complete'";
			$sqlah = "SELECT COUNT(*) FROM fielddata WHERE ftfc='Incomplete'";*/

					$rsltaa = mysqli_query($connection, $sqlaa);
					$rsltab = mysqli_query($connection, $sqlab);
					/*$rsltac = mysql_query($sqlac, $conn);
			$rsltad = mysql_query($sqlad, $conn);
			$rsltae = mysql_query($sqlae, $conn);
			$rsltaf = mysql_query($sqlaf, $conn);
			$rsltag = mysql_query($sqlag, $conn);
			$rsltah = mysql_query($sqlah, $conn);*/
				} else {


					if (isset($_COOKIE['cssd'])) {
						$sql = 'SELECT * FROM fielddata WHERE ftcc ="' . $cssd . '" ORDER BY fttym DESC';
					}/*else if (isset($_COOKIE['siid'])){
				$sql = 'SELECT * FROM fielddata WHERE ft = "'.$svmst.'" AND ftsi = "'.$siid.'" ORDER BY fttym DESC';
			    } else if (isset($_COOKIE['feid'])){
				$sql = 'SELECT * FROM fielddata WHERE ft = "'.$svmst.'" AND ftfe = "'.$feid.'" ORDER BY fttym DESC';
			    } else if (isset($_COOKIE['fcid'])) {
				$sql = 'SELECT * FROM fielddata WHERE ft = "'.$svmst.'" AND ftfc = "'.$fcid.'" ORDER BY fttym DESC';
			    */ else {
						$sql = 'SELECT * FROM fielddata WHERE ftname = "' . $svmst . '" ORDER BY fttym DESC';
					}

					$rslt = mysqli_query($connection, $sql);

					$sqlaa = "SELECT COUNT(*) FROM fielddata WHERE ftcc='Complete'";
					$sqlab = "SELECT COUNT(*) FROM fielddata WHERE ftcc='Incomplete'";
					/*$sqlac = "SELECT COUNT(*) FROM fielddata WHERE ftsi='Complete' AND ft = '$svmst'";
			$sqlad = "SELECT COUNT(*) FROM fielddata WHERE ftsi='Incomplete' AND ft = '$svmst'";
			$sqlae = "SELECT COUNT(*) FROM fielddata WHERE ftfe='Complete' AND ft = '$svmst'";
			$sqlaf = "SELECT COUNT(*) FROM fielddata WHERE ftfe='Incomplete' AND ft = '$svmst'";
			$sqlag = "SELECT COUNT(*) FROM fielddata WHERE ftfc='Complete' AND ft = '$svmst'";
			$sqlah = "SELECT COUNT(*) FROM fielddata WHERE ftfc='Incomplete' AND ft = '$svmst'";
			*/
					$rsltaa = mysqli_query($connection, $sqlaa);
					$rsltab = mysqli_query($connection, $sqlab);
					/*$rsltac = mysql_query($sqlac, $conn);
			$rsltad = mysql_query($sqlad, $conn);
			$rsltae = mysql_query($sqlae, $conn);
			$rsltaf = mysql_query($sqlaf, $conn);
			$rsltag = mysql_query($sqlag, $conn);
			$rsltah = mysql_query($sqlah, $conn);
			 */
				}
			} else {
				if (isset($_COOKIE['cssd'])) {
					$sql = "SELECT * FROM fielddata WHERE ftcc = '$cssd' ORDER BY fttym DESC";
				}/*else if (isset($_COOKIE['siid'])){
				$sql = "SELECT * FROM fielddata WHERE ftsi =  '$siid' ORDER BY fttym DESC";
				} else if (isset($_COOKIE['feid'])){
				$sql = "SELECT * FROM fielddata WHERE ftfe = '$feid' ORDER BY fttym DESC";
				} else if (isset($_COOKIE['fcid'])) {
				$sql = "SELECT * FROM fielddata WHERE  ftfc =  '$fcid' ORDER BY fttym DESC";	
				}*/ else {
					$sql = "SELECT * FROM fielddata ORDER BY fttym DESC";
				}

				$rslt = mysqli_query($connection, $sql);



				$sqlaa = "SELECT COUNT(*) FROM fielddata WHERE ftcss='Complete'";
				$sqlab = "SELECT COUNT(*) FROM fielddata WHERE ftcss='Incomplete'";
				/*$sqlac = "SELECT COUNT(*) FROM fielddata WHERE ftsi='Complete'";
			$sqlad = "SELECT COUNT(*) FROM fielddata WHERE ftsi='Incomplete'";
			$sqlae = "SELECT COUNT(*) FROM fielddata WHERE ftfe='Complete'";
			$sqlaf = "SELECT COUNT(*) FROM fielddata WHERE ftfe='Incomplete'";
			$sqlag = "SELECT COUNT(*) FROM fielddata WHERE ftfc='Complete'";
			$sqlah = "SELECT COUNT(*) FROM fielddata WHERE ftfc='Incomplete'";
			*/

				$rsltaa = mysqli_query($connection, $sqlaa);
				$rsltab = mysqli_query($connection, $sqlab);

				/*$rsltac = mysql_query($sqlac, $conn);
			$rsltad = mysql_query($sqlad, $conn);
			$rsltae = mysql_query($sqlae, $conn);
			$rsltaf = mysql_query($sqlaf, $conn);
			$rsltag = mysql_query($sqlag, $conn);
			$rsltah = mysql_query($sqlah, $conn);*/
			}

			/* 
		if ($rowaa = mysql_fetch_array($rsltaa)){
					$aa = $rowaa['COUNT(*)'];
				}else{
					$aa = 0;
				}
			
			if ($rowab = mysql_fetch_array($rsltab)){
					$ab = $rowab['COUNT(*)'];
				}else{
					$ab = 0;
				}
		 */
			/*	
			if ($rowac = mysql_fetch_array($rsltac)){
					$ac = $rowac['COUNT(*)'];
				}else{
					$ac = 0;
				}
				
			if ($rowad = mysql_fetch_array($rsltad)){
					$ad = $rowad['COUNT(*)'];
				}else{
					$ad = 0;
				}
				
			if ($rowae = mysql_fetch_array($rsltae)){
					$ae = $rowae['COUNT(*)'];
				}else{
					$ae = 0;
				}
				
			if ($rowaf = mysql_fetch_array($rsltaf)){
					$af = $rowaf['COUNT(*)'];
				}else{
					$af = 0;
				}
				
			if ($rowag = mysql_fetch_array($rsltag)){
					$ag = $rowag['COUNT(*)'];
				}else{
					$ag = 0;
				}
				
			if ($rowah = mysql_fetch_array($rsltah)){
					$ah = $rowah['COUNT(*)'];
				}else{
					$ah = 0;
				}
		*/



			echo "<table id='waokoe' cellspacing='1' cellpadding='2'>";
			echo ('<thead>');
			echo ('<tr>');

			//echo('<th style="display:none"></th>');
			echo ('<th align="center" valign="middle" style="width:45%">SPECIES</th>');
			echo '<th align="center" valign="middle" style="width:45%">AGENT</th>';
			echo ('<th align="center" valign="middle" style="width:10%">LOCATE</th>');

			echo ('</tr>');
			echo ('</thead>');
			echo ('<tbody>');

			if ($rslt) {
				while ($row = mysqli_fetch_array($rslt)) {

					$sevmx = $row['ftlon'];
					$sevmy = $row['ftlat'];
					$ftname = $row['ftname'];
					//$sevtl = $row['ft'];
					$sevid = $row['fid'];
					$ftcom = $row['ftcom'];
					$ftgar = $row['ftgar'];
					$ftiar = $row['ftiar'];
					$userNm = $row['foutid'];
					$userNmArr = explode("_", $userNm);
					$ftcnt = $userNmArr[1];
					//$ftcnt = substr($ftcnt, 5, -20);
					//$ftcnt = substr($ftcnt, 0, strrpos($ftcnt,'_'));
					$ftcom = $row['ftcom'];
					$ftcc = $row['ftcc'];
					$fthab = $row['fthab'];
					$ftabd = $row['ftabd'];
					$ftown = $row['ftown'];
					$ftara = $row['ftara'];
					$ftpic = $row['ftpicnm'];
					$ftorg = $row['ftorg'];
					$ftcon = $row['ftcons'];
					$ftsettle = $row['ftsettlement'];

					/*$ftorg = stripslashes($ftorg);
            $ftorg = mysql_real_escape_string($ftorg);
                        $ftorg = htmlentities($ftorg);

                         $ftcon = stripslashes($ftcon);
            $ftcon = mysql_real_escape_string($ftcon);
                        $ftcon = htmlentities($ftcon);




			$ftname = stripslashes($ftname);
            $ftname = mysql_real_escape_string($ftname);
			$ftname = htmlentities($ftname);
			$ftiar = stripslashes($ftiar);
            $ftiar = mysql_real_escape_string($ftiar);
			$ftgar = stripslashes($ftgar);
            $ftgar = mysql_real_escape_string($ftgar);
			$fthab = stripslashes($fthab);
            $fthab = mysql_real_escape_string($fthab);
			$ftcom = stripslashes($ftcom);
            $ftcom = mysql_real_escape_string($ftcom);*/

					$klas = "";


					if ($ninani == "hkn") {
						$fff = "LOGIN TO VIEW";
						echo "<script type='text/javascript'>", "jow('$ftname','$ftcnt','$ftiar','$ftgar','$ftcc' ,'$fthab','$ftabd','$ftown','$ftara','$ftsettle','$ftcom','$ftpic','$ftorg','$ftcon','$sevmx','$sevmy');", "</script>";
					} else {
						echo "<script type='text/javascript'>", "jow('$ftname','$ftcnt','$ftiar','$ftgar','$ftcc' ,'$fthab','$ftabd','$ftown','$ftara','$ftsettle','$ftcom','$ftpic','$ftorg','$ftcon','$sevmx','$sevmy');", "</script>";
					}



					//echo '<tr class='.$klas.' id="apa'.$sevid.'" onclick="tulo('.$sevid.',\''.$sevdc.'\','.$sevas.','.$sevct.','.$sevrp.',\''.$sevpc.'\',\''.$sevcm.'\')">';
					echo '<tr>';
					$fefe = str_replace("\'", "'", $ftname);
					echo ('<td id="nom">' . $fefe . '</td>');
					echo ('<td id="tel">' . $ftcnt . '</td>');
					//echo('<td id="tel" align="center">'.$ftc.'</td>');
					echo "<td id='wapi' class='rer' align='center' valign='middle'> <a href='#' class='ert' onclick='dee($sevmy,$sevmx)'>  >>> </a>  </td>";

					echo ('</tr>');
					//echo "<script type='text/javascript'>","kiw('$sevid','$sevas','$sevct');","</script>";
				}
			}
			echo ('</tbody>');
			echo ('</table>');

			echo ('</div>');
			echo ('</div>');


			if (isset($_SESSION['sod'])) {

				/*
	echo('<div id="statz">'); 
	
	echo('<h4 style="position:relative;text-align:center">AGGREGATE STATISTICS</h4>');
	
	echo('<table id="waokoe2" cellspacing="1" cellpadding="2">');
        echo('<thead>');
		echo('<tr>');
		    echo('<th align="center" valign="middle" style="width:50%">CHARACTERISTIC</th>');
			echo('<th align="center" valign="middle" style="width:50%">TOTAL</th>');
		
		echo('</tr>');
	    echo('</thead>');
	    echo('<tbody>');
		
		
		
		echo('<tr><td colspan="2"  align="center" valign="middle"><b>Construction Status</b></td></tr>');
		echo('<tr>' );
			echo('<td id="tel" align="left">Complete</td>' );
			echo('<td id="tel" class="ore" align="center">'.$aa.'</td>');
	    echo('</tr>');
		
		echo('<tr>' );
			echo('<td id="tel" align="left">Incomplete</td>' );
			echo('<td id="tel" class="ore" align="center">'.$ab.'</td>');
	    echo('</tr>');
		
		
		echo('<tr><td colspan="2" align="center" valign="middle"><b>Soil Investigation</b></td></tr>');
		echo('<tr>');
			echo(' <td id="tel" align="left">Complete</td>' );
			echo(' <td id="tel" class="ore" align="center">'.$ac.'</td>');
	    echo ('</tr>');
		
		echo('<tr>' );
			echo(' <td id="tel" align="left">Incomplete</td>' );
			echo(' <td id="tel" class="ore" align="center">'.$ad.'</td>');
	    echo('</tr>');
		
		
		echo('<tr><td colspan="2" align="center" valign="middle"><b>Foundation Excavation</b></td></tr>');
		echo('<tr>' );
			echo(' <td id="tel" align="left">Complete</td>' );
			echo(' <td id="tel" class="ore" align="center">'.$ae.'</td>');
	    echo('</tr>');
		
		echo('<tr>' );
			echo(' <td id="tel" align="left">Incomplete</td>' );
			echo(' <td id="tel" class="ore" align="center">'.$af.'</td>');
	    echo ('</tr>');
		
		
		echo('<tr><td colspan="2" align="center" valign="middle"><b>Foundation Concreting</b></td></tr>');
		echo('<tr>' );
			echo(' <td id="tel" align="left">Complete</td>' );
			echo(' <td id="tel" class="ore" align="center">'.$ag.'</td>');
	    echo('</tr>' );
		
		echo('<tr>' );
			echo(' <td id="tel" align="left">Incomplete</td>' );
			echo(' <td id="tel" class="ore" align="center">'.$ah.'</td>');
	    echo('</tr>');
		
		
		echo('</tbody>');
		echo('</table>');
       
echo ('</div>');  
*/
				/*
echo('<div id="statz2">'); 
	
	echo('<h4 style="position:relative;text-align:center">SELECT VIEW</h4>');
  
	  echo ('<form id="filtaa" action="filtaa.php" method="post">');
	  
	  echo('<table id="waokoe2" cellspacing="1" cellpadding="2">');
	  
	  echo('<tbody>');
	  
	  echo('<tr><td colspan="2"  align="center" valign="middle" class="ore2"><b>Construction Status</b></td></tr>');
		echo('<tr>' );
			echo('<td id="tel" align="left">   <input  type="checkbox" name="waaah" value="css1" id="c1" > <label  for="c1">Complete</label>  </td>' );
			echo('<td id="tel" align="left">   <input  type="checkbox" name="waaah" value="css2" id="c2" > <label  for="c2">Incomplete</label>                    </td>');
	    echo('</tr>');
	  
	  
	  echo('<tr><td colspan="2"  align="center" valign="middle" class="ore2"><b>Soil Investigation</b></td></tr>');
		echo('<tr>' );
			echo('<td id="tel" align="left">   <input type="checkbox" name="waaah" value="si1" id="c7" > <label  for="c7">Complete</label>  </td>' );
			echo('<td id="tel" align="left">   <input type="checkbox" name="waaah" value="si2" id="c8" > <label  for="c8">Incomplete</label>                    </td>');
	    echo('</tr>');
	 
	 echo('<tr><td colspan="2"  align="center" valign="middle" class="ore2"><b>Foundation Excavation</b></td></tr>');
		echo('<tr>' );
			echo('<td id="tel" align="left">   <input type="checkbox" name="waaah" value="fe1" id="c3" > <label  for="c3">Complete</label>  </td>' );
			echo('<td id="tel" align="left">   <input type="checkbox" name="waaah" value="fe2" id="c4" > <label  for="c4">Incomplete</label>                    </td>');
	    echo('</tr>');
      
	 echo('<tr><td colspan="2"  align="center" valign="middle" class="ore2"><b>Foundation Concreting</b></td></tr>');
		echo('<tr>' );
			echo('<td id="tel" align="left">   <input type="checkbox" name="waaah" value="fc1" id="c5" > <label  for="c5">Complete</label>  </td>' );
			echo('<td id="tel" align="left">   <input type="checkbox" name="waaah" value="fc2" id="c6" > <label  for="c6">Incomplete</label>                    </td>');
	    echo('</tr>');
	
	 
	 echo('</tbody>');
		echo('</table>');
	 
	
	  
	  echo('</form>');
	  
	  
echo ('</div>');
 */
			}

			?>

			<script>
				$(window).load(function() {

					$('.ert').click(function(event) {
						event.stopImmediatePropagation();
					});


				});
			</script>



</body>

</html>