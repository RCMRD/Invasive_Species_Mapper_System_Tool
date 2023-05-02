<?php
if (isset($_POST['stata'])){
$svmst = $_POST['tafta'];
	session_start();
$_SESSION['fcha'] = $svmst;
}
header('Location: index.php');
?>