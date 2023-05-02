<?php


if (isset($_POST['waaah'])){
	$val = $_POST['waaah'];
	
	if($val=="css1")
	{
		setcookie("cssd","Complete",time() + 6000,'/');
	}
	else if ($val=="css2")
	{
		setcookie("cssd","Incomplete",time() + 6000,'/');
	}
	
	
	/*else if($val=="si1")
	{
				setcookie("siid","Complete",time() + 6000,'/');
	}
	else if ($val=="si2")
	{
				setcookie("siid","Incomplete",time() + 6000,'/');
	} 
	else if($val=="fe1")
	{
				setcookie("feid","Complete",time() + 6000,'/');
	}
	else if ($val=="fe2")
	{
				setcookie("feid","Incomplete",time() + 6000,'/');
	} 
	else if($val=="fc1")
	{
		        setcookie("fcid","Complete",time() + 6000,'/');
	}
	else if ($val=="fc2")
	{
		         setcookie("fcid","Incomplete",time() + 6000,'/');
	} 
	*/
}
header('Location: index.php');
?>