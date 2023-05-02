<?php
$graphq = parse_ini_file('/etc/cgi_bin.ini');
$conn = new mysqli($graphq[USQ], $graphq[UPQ], $graphq[PPQ], "SpatiaInvSpc");

$error_passwd = "101";
$error_userer = "202";
$error_server = "303";
$error_regiko = "404";


if ($conn->connect_error) {
  die($error_server);
}else{


  if (!empty($_POST["regista_PostJSON"])){

              //resp:success
    $pita = array();
    $pita[] = array("resp" => "success");

    $respJSON = json_encode($pita);

    $obj = json_decode($_POST["regista_PostJSON"], true);

    $simu = $obj[0]["_usertel"];
    $pepe = $obj[0]["_useremail"];
    $pwdo = $obj[0]["_userpass"];
    $pwdo_h = password_hash($pwdo,PASSWORD_DEFAULT);


    if ($st = $conn->prepare("SELECT * FROM appuser WHERE usamail = ? OR usafon = ?")){
      $st->bind_param("ss", $pepe, $simu);
      $st->execute();
      $st->store_result();

      if ($st-> num_rows > 0) {

        echo $error_regiko;

      }else{
        $st->close();
        $st = $conn->prepare('INSERT INTO appuser (usaname,usafon,usactry,usamail,usapwd,usalat,usalon) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $st->bind_param('sssssss', $nani, $simu, $wapi, $pepe, $siri, $lato, $lono);


        foreach ($obj as $key => $value) {

          $nani = $value["_username"];
          $simu = $value["_usertel"];
          $wapi = $value["_usercntry"];
          $pepe = $value["_useremail"];
          $siri = $pwdo_h;
          $lato = $value["_userlat"];
          $lono = $value["_userlon"];

          if($st->execute()){
            echo $respJSON;
          }else{
            echo $error_server;
          }
        }

      }      

      $st->close();
      $conn->close();
    }else{
      echo $error_server;
    }

  }else 
  if(!empty($_POST["login_CheckJSON"])){
  //add get all data from fielddata to send to phone too
   $sw = 1;
   
   $obj = json_decode($_POST["login_CheckJSON"], true);

   $simu = $obj[0]["_usertel"];
   
   $pswd = $obj[0]["_userpass"];
   
   if ($st = $conn->prepare("SELECT * FROM appuser WHERE usaapproved = ? AND usafon = ?")){
    $st->bind_param("is", $sw, $simu); 
    $st->execute();
    $result = $st->get_result();


    if($result->num_rows == 1) {

      $row = $result->fetch_assoc();
      $pwd_s = $row['usapwd'];

      if(password_verify($pswd, $pwd_s)){

        $udata = array();
        $udata[] = array(
          "_userid" => $row['userid'],
          "_username" => $row['usaname'],
          "_usertel" => $row['usafon'],
          "_usercntry" => $row['usactry'],
          "_useremail" => $row['usamail'],
          "_userlat" => $row['usalat'],
          "_userlon" => $row['usalon'],
          "_userstatus" => $row['usaapproved'],
        );


        $respJSON = json_encode($udata);

        echo $respJSON;


      }else{

        echo $error_passwd;

      }

    }else{

     echo $error_userer;

   }

   $st->close();
   $conn->close();


 }else{

  echo $error_server;

}

} else 
if (!empty($_POST["loginforgotemail_PostJSON"])) {
    //add get all data from fielddata to send to phone too
  $sw = 1;

  $obj = json_decode($_POST["loginforgotemail_PostJSON"], true);

  $mail = $obj[0]["_useremail"];

  if ($st = $conn->prepare("SELECT * FROM appuser WHERE usaapproved = ? AND usamail = ?")) {
    $st->bind_param("is", $sw, $mail);
    $st->execute();
    $result = $st->get_result();


    if ($result->num_rows == 1) {

      $row = $result->fetch_assoc();
      $name = $row['usaname'];

      $bytes = openssl_random_pseudo_bytes(4);
      $code = bin2hex($bytes);

      $headers = "From: servirafrica@gmail.com" . "\r\n" .
      "BCC: sotieno@rcmrd.org";

      $subject = "Invasive Species Mapper Reset Password Request";

      $msg = "Hello ".$name. ",\nPlease use this secure code to change your password:\n\n".$code;
      $msg = wordwrap($msg, 70);
      mail($mail, $subject, $msg, $headers);

      $udata = array();
      $udata[] = array(
        "_usercode" => $code
      );

      $respJSON = json_encode($udata);

      echo $respJSON;

    } else {
      echo $error_userer;
    }

    $st->close();
    $conn->close();
  } else {

    echo $error_server;
  }

} else 
if (!empty($_POST["loginforgotpassword_PostJSON"])) {
    //add get all data from fielddata to send to phone too
  $sw = 1;

  $obj = json_decode($_POST["loginforgotpassword_PostJSON"], true);

  $mail = $obj[0]["_useremail"];
  $pass = $obj[0]["_userpass"];
  $pwdo_h = password_hash($pass, PASSWORD_DEFAULT);

  if ($st = $conn->prepare("SELECT * FROM appuser WHERE usaapproved = ? AND usamail = ?")) {
    $st->bind_param("is", $sw, $mail);
    $st->execute();
    $result = $st->get_result();


    if ($result->num_rows == 1) {


      $st->close();
      $st = $conn->prepare('UPDATE appuser SET usapwd = ? WHERE usamail = ?');
      $st->bind_param('ss', $pwdo_h, $mail);


      if (!$st->execute()) {
        echo $error_server;
      }else{

        $udata = array();
        $udata[] = array(
          "success" => true
        );

        $respJSON = json_encode($udata);

        echo $respJSON;

      }


    } else {
      echo $error_userer;
    }

    $st->close();
    $conn->close();
  } else {

    echo $error_server;
  }


}else
if(!empty($_POST["maindata_PostJSON"])){

  $obj = json_decode($_POST["maindata_PostJSON"], true);
  $sendAr = array();

  foreach ($obj as $key => $value) {


    $dref = $value["_datno"];
    $ftr = $value['_datftrname'];
    $cnt = $value['_datcnt'];
    $iar = $value['_datiar'];
    $gar = $value['_datgar'];
    $cc = $value['_datcc'];
    $hab = $value['_dathab'];
    $abd = $value['_databd'];
    $own = $value['_datown'];
    $ara = $value['_datara'];
    $datlon = $value['_datlon'];
    $datlat = $value['_datlat'];
    $set = $value['_datset'];
    $picnm = $value['_datpicnm'];
    $com = $value['_datcom'];
    $org = $value['_locorg'];
    $con = $value['_loccon'];
    

    if ($key == "_datno"){
      $sendAR[$key] = $value;
    }


    if ($st = $conn->prepare("SELECT foutid FROM fielddata WHERE foutid = ?")){

      $st->bind_param('s', $dref);
      $st->execute();
      $result = $st->get_result();


      if($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $dref_s = $row['foutid'];

        if($dref_s == $dref){

          $st->close();
          $st = $conn->prepare('UPDATE fielddata SET ftname = ?, ftcnt = ?, ftiar = ?, ftgar = ?, ftcc = ?, fthab = ?, ftabd = ?, ftown = ?, ftara = ?, ftsettlement = ?, ftlon = ?, ftlat = ?, ftorg = ?, ftcons = ?, ftpicnm = ?, ftcom = ? WHERE foutid = ?');
          $st->bind_param('sssssssssssssssss', $ftr, $cnt, $iar, $gar, $cc, $hab, $abd, $own, $ara, $set, $datlon, $datlat, $org, $con, $picnm, $com, $dref);


          if (!$st->execute()) {
            echo $error_server;
          }

        }
        
      } else {

        $st->close();
        $st = $conn->prepare('INSERT INTO fielddata (ftname, ftcnt, ftiar, ftgar, ftcc, fthab, ftabd, ftown, ftara, ftsettlement, ftlon, ftlat, ftorg, ftcons, ftpicnm, ftcom, foutid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $st->bind_param('sssssssssssssssss', $ftr, $cnt, $iar, $gar, $cc, $hab, $abd, $own, $ara, $set, $datlon, $datlat, $org, $con, $picnm, $com, $dref);

        
        if(!$st->execute()){
          echo $error_server;
            // echo $st-> error;
        }


      }
    } else {
      echo $error_server;
    }

    } //end loop

    $res = json_encode($sendAR);
    echo $res;

  }else 
  if(!empty($_POST["loginLoc_PostJSON"])){
   
   $obj = json_decode($_POST["loginLoc_PostJSON"], true);

   
   if ($st = $conn->prepare("SELECT * FROM locations")){
                    
      $st->execute();
      $result = $st->get_result();
      
      $udata = array();

      $rows = $result->fetch_all(MYSQLI_ASSOC);
      
      foreach ($rows as $row) {

        $org = $row['organisation'];
        $con = $row['conservancies'];
        $cnt = $row['country'];
        $lno = $row['locno'];
      
        $udata[] = array(
                        '_locorg' => $org, 
                        '_loccon' => $con,
                        '_locctry' => $cnt,
                        '_locno' => $lno
                      );
      
      }

      //256 encode
      $integrity = hash('sha256', json_encode($udata));

      $final_udata[] = array(
        "data" => $udata,
        "success" => true,
        "integrity" => $integrity
      );

      $respJSON = json_encode(array_values($final_udata));

      echo $respJSON;

    }else {

      echo $error_server;
    }

  }else
  if(!empty($_POST["data_GeoJSON"])){

    $sqlStmt="SELECT * FROM fielddata";//select from table

    if ($st = $conn->prepare($sqlStmt)){
            //you can alter to use binding incase of condition e.g. WHERE
      if(!$st->execute()){
        echo "Error : NO - ". $st->errno ." MSG - ". $st->error;
      }
      $st_result = $st->get_result();

      if ($st_result-> num_rows > 0) {


        $allData = array();

        //select fields from the table and assign field names as you deem fit

        while ($row = $st_result->fetch_assoc()){

          $allData[] = array(
            "_datftrname" => $row["ftname"],
            "_datcnt" => $row["ftcnt"],
            "_datiar" => $row["ftiar"],
            "_datgar" => $row["ftgar"],
            "_datcc" => $row["ftcc"],
            "_dathab" => $row["fthab"],
            "_databd" => $row["ftabd"],
            "_datown" => $row["ftown"],
            "_datara" => $row["ftara"],
            "_datset" => $row["ftsettlement"],
            "latitude" => $row["ftlat"],
            "longitude" => $row["ftlon"],
            "_datpicnm" => $row["ftpicnm"],
            "_datcom" => $row["ftcom"],
            "_locorg" => $row["ftorg"],
            "_loccon" => $row["_ftcons"],
            "_datno" => $row["foutid"],
            "_dattym" => $row["fttym"]
          );
          
        }

        $tempJSONFile = 'data_.json'; //temporary file to hold the array as a JSON
        file_put_contents($tempJSONFile, json_encode($allData));
        ob_start();
        passthru('python GeoJSONFormater.py'); //make sure python is installed on server; it gets the tempJSONFile data - make sure to make first instance of file chown and chmod to right user
        $geoJSONOutput = ob_get_clean(); //the geoJSON data
        file_put_contents("fieldtableData.geojson",$geoJSONOutput); //save the geoJSON data
        echo "done";

      }

      $st->close();
      $conn->close();         
  }

  }else
  if(!empty($_POST["maindata_PostImages"])){

    $obj = json_decode($_POST["maindata_PostImages"], true);

    $zfyl = $obj[0]["zipfile"];

    $znem = $obj[0]["zipname"];

    $picov = base64_decode($zfyl);

    $fp = fopen('./ges/'.$znem,'w');

    if($fp){

      fwrite($fp,$picov);
      fclose($fp);

      $upload_folder = 'ges/';
      $upload_files = 'ges/'.$znem;

      system("unzip -d $upload_folder -o $upload_files");

      unlink('./ges/'.$znem);

    }
}

}