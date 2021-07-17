<?php
error_reporting(E_ALL);
	ini_set('display_errors', 'on');

function connect()
{
		$host = "localhost";
		$app_db = "marketplace";
		$user = "root";
		$pwd = "";
		
		return mysqli_connect($host,$user,$pwd, $app_db);	
}

function CleanData($field) {
    $cleanField = trim($field);
    $cleanField = stripslashes($cleanField);
    $cleanField = htmlspecialchars($cleanField);
    return $cleanField;
  }

function loggedin()
{
	if((isset($_SESSION['user_id']) and $_SESSION['user_id'] != "") or (isset($_SESSION['user_name']) and $_SESSION['user_name'] != ""))
	{
		$loggedin = true;
	}
	else
	{
		$loggedin = false;
		
	}
		return $loggedin;	
}



function findEmail($mail, $conn)
{
	$qry = "select * from sellers where email='$mail'";
	$qryr = mysqli_query($conn, $qry);
	$numr = mysqli_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function findProduct($name, $conn)
{
	$qry = "select * from products where pname='$name' and sellersID=".$_SESSION['user_id'];
	$qryr = mysqli_query($conn, $qry);
	$numr = mysqli_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function Processlogin($username, $password, $conn)
{
	if($username == "" or $password == "")
	{
		return false;
	}
	
	$qry1 = "select * from sellers where email='$username' and password='".md5($password)."'";
	
	
	$r1 = mysqli_query($conn, $qry1) or die(mysqli_error($conn));
	
	if(mysqli_num_rows($r1) > 0)
	{
		$row = mysqli_fetch_assoc($r1);
		$_SESSION['user_name'] = $row['name'];
		$_SESSION['title'] = $row['name']." Welcome to The Marketplace Dashboard!";
		$_SESSION['user_id'] = $row['sellersID'];
							
		return true;
		
	}
	else
	{

			return false;

	}
	
}

function validatefile($files)
{
	//$filename = array();
	$tmp = array();
	$allowedExtensions = array("jpg", "pjpg", "png", "gif");
  foreach ($files as $filename) {
    if ($filename['tmp_name'] != '') {
		
		$tmp = explode(".",strtolower($filename['name']));
		
		$fileext = end($tmp);
		
      if (!in_array($fileext, $allowedExtensions)) {
		return false;	
      }
	  else
	  {
	  
	  	return true;
	  }
    }
  }

}


function getUpdateDetail($value, $table, $unique, $conn)
{
	$q = "select * from `$table` where `$unique`='$value'";
	$r = mysqli_query($conn, $q) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($r);
	return $row;	
}

function trim_text($input, $length) {
    //strip tags, if desired

  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    
        $trimmed_text .= '...';
    
  
    return $trimmed_text;
}
?>