<?php
$picn = $_POST['pichan'];

if (isset($_POST['pichar'])){
$pico = $_POST['pichar'];
		
$picov = base64_decode($pico);
$fp = fopen('./ges/'.$picn,'w');



if($fp){
fwrite($fp,$picov);
fclose($fp);
  
$upload_folder = 'ges/';
$upload_files = 'ges/'.$picn;

system("unzip -d $upload_folder -o $upload_files");

unlink('./ges/'.$picn);
		
}

}


?>