<?php session_start();
	include('includes/function.php');	
	
	$appconnect=connect();
	$act = $_GET['action'];
	$uid = CleanData($_GET['id']);

	switch($act)
	{
		case "pro":
				$q = "delete from `products` where productsID='$uid'";
				mysqli_query($appconnect, $q) or die(mysqli_error($appconnect));
				header("Location:viewmyproducts.php");		
		break;
			
			
	}

?>