<?php session_start();
	include('includes/function.php');	
	
	$appconnect=connect();

	set_time_limit(0);

	if(empty($_SESSION))
{
    $_SESSION['title'] = "Welcome to the Market Place";
   // $_SESSION['lstatus'] = false;

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo $_SESSION['title'];?></title>
		<meta name="description" content="EXCEPTION – Responsive Business HTML Template">
		<meta name="author" content="EXCEPTION">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/prettyPhoto.css">
		<link rel="stylesheet" href="css/slick.css">
		<link rel="stylesheet" href="rs-plugin/css/settings.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">
		<!--[if lt IE 9]>
	    	<link rel="stylesheet" href="css/ie.css">
	    	<script type="text/javascript" src="js/html5.js"></script>
	    <![endif]-->


		<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
		<link rel="stylesheet" href="css/skins/default.css">
		
		<script language="JavaScript">

function delArticle(para, title)

{

   if (confirm("Are you sure you want to delete '" + title + "'"))

   {

      window.location.href = 'delete.php?id=' + para + '&action=pro';

   }

}

</script>
	
	</head>
	
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper left-side-wrap clearfix">
	    
			<!-- Header Start -->
			<div id="headWrapper" class="left-side-header clearfix">
		    				    
			    <!-- Logo, global navigation menu and search start -->
			    <header class="top-head" style="padding-top: 20px;">
	    			
	    			<div class="logo">
				    	<a href="home.html"></a>
				    </div>
	    			
	    			<nav class="side-nav lft mega-menu">
		    			<ul>
					      <li><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a>
	
					      </li>
							<?php if(!loggedin()){?>
					      <li class="selected"><a href="#"><i class="fa fa-gift"></i><span>Sellers</span></a>
					      	<ul>
							      <li class="selected"><a href="register.php"><i class="fa fa-registered"ss></i>Register</a>
							      									      </li>
							      <li><a href="login.php"><i class="fa fa-sign-in"></i>Login</a></li>
							 </ul>
						</li>
							<?php }else{?>
						<li><a href="mydashboard.php"><i class="fa fa-gear"></i><span>My dashboard</span></a>
	
					      </li>
							
						<li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Signout</span></a>
	
					      </li>
							<?php }?>
							      
					    </ul>
				    </nav>
				    <!--<div class="search-box-side">
			    		<div class="input-box left">
			    			<input type="text" name="t" id="t-search" class="txt-box" placeHolder="Enter search keyword here..." />
			    		</div>
			    		<div class="left">
			    			<input type="submit" id="b-search" class="btn main-bg" value="GO" />
			    		</div>
			    	</div>-->
			    	
			    	<!--<div class="side-head-block">
			    		<ul class="social-list hover_links_effect">
						    <li><a href="#" data-title="facebook" data-tooltip="true" data-position="top"><span class="fa fa-facebook"></span></a></li>
						    <li><a href="#" data-title="linkedin" data-tooltip="true" data-position="top"><span class="fa fa-linkedin"></span></a></li>
						    <li><a href="#" data-title="skype" data-tooltip="true" data-position="top"><span class="fa fa-skype"></span></a></li>
						    <li><a href="#" data-title="twitter" data-tooltip="true" data-position="top"><span class="fa fa-twitter"></span></a></li>
						    <li><a href="#" data-title="YouTube" data-tooltip="true" data-position="top"><span class="fa fa-youtube"></span></a></li>
					    </ul>
			    	</div>-->
			    </header>
			    <!-- Logo, Global navigation menu and search end -->
			    
			</div>