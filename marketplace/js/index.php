<?php
/*	include("includes/functions.php");
	
	connect();*/
	//include("includes/sanitize.php");
	

	
	if(isset($_GET['page']) or isset($_GET['subpage']))
	{
		if(isset($_GET['page']) and !isset($_GET['subpage']))
		{
			
		header("Location:innerpages.php?page=".$_GET['page']);
		exit();
		}
		
		if(isset($_GET['page']) and isset($_GET['subpage']))
		{
			
			header("Location:innerpages.php?page=".$_GET['page']."&subpage=".$_GET['subpage']);
			exit();
		}
	}
	else
	{
		$req = $_SERVER['REQUEST_URI'];
		
		if($req == "/" or $req == "/index.php")
		{
		include("home.php");
		exit();
	
		}
		else
		{
			
		$req = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
		header("Location:".$req);	
		exit();	
		
		}
	}
	


//echo $req."<br/>";

/*$req1 = ;

echo $req1;*/	
?>