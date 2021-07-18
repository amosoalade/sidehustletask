<?php ob_start();session_start();
include("includes/functions.php");
include("includes/sanitize.php");
	$appconnect=connect();
	
	
	if(loggedin() and (isset($_SESSION['staff_username']) and $_SESSION['staff_username'] != ""))
	{
echo '<script language="JavaScript">
				
					window.location.href="mydashboard.php";
					
				</script>';
	}
	
if(loggedin() and (isset($_SESSION['student_username']) and $_SESSION['student_username'] != ""))
	{
echo '<script language="JavaScript">
				
					window.location.href="studentportal.php";
					
	</script>';
	}
	
if(loggedin() and (isset($_SESSION['alumni_username']) and $_SESSION['alumni_username'] != ""))
	{
echo '<script language="JavaScript">
				
					window.location.href=alumnidashboard.php";
					
	</script>';
	}		
	
$bq = "select * from banner where sub_pageID=".getSubPageID("Registration", $appconnect)." order by bannerID DESC";	
$br = mysqli_query($appconnect, $bq) or die(mysql_error($appconnect));	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Student Registration</title>
				
		<meta name="author" content="Accountancy Department, MAPOLY">
		
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
		<link rel="stylesheet" href="css/skins/skin5.css">
	
	</head>
	<body <?php
			if(isset($_GET['msg']))
			{
				switch($_GET['msg'])
				{
					case 'empty':
						echo 'onload="alartme();"';
						$message = 'One or more field(s) is / are empty!';
					break;
					
					case 'm':
						echo 'onload="alartme7();"';
						$message = 'E-mail supplied already exist or in wrong format!';
					break;	
					
					case 'e':
						echo 'onload="alartme8();"';
						$message = 'Matric Number already exists!';
					break;
					
					case 'mf':
						echo 'onload="alartme10();"';
						$message = 'Matric Number Supplied is in wrong format!';
					break;					
					
					case 's':
						echo 'onload="alartme9();"';
						$message = 'Registration was successful! Check your mail inbox / spam folder for further details';
					break;																								
					
					default:
										
				}
			}
			?>>
	    
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
				    	<a href="#"></a>
				    </div>
	    			
	    			<nav class="side-nav lft mega-menu">
		    			<?php
										$link = "<ul>";
									    $qry = "select * from `adio_page` order by pageorder";
										$qryresult = mysqli_query($appconnect, $qry);
										$selected = "";
	
										while($row = mysqli_fetch_assoc($qryresult))
										{
											$url = $row['url'];
											
											if($url == "")
											{
												$finalurl = "index.php?page=".$row["adio_page"];
											}
											else
											{
												$finalurl = $url;												
											}
											
											if(isset($_GET['page'])){
											if($_GET['page'] == $row['adio_page'])
											{
												$selected = 'class="selected"';
											}
											}
											
											$link.= "<li ".$selected."><a href='".$finalurl."'><span>".$row["adio_page"]."</span></a>".getSubPage($row["adio_pageID"], $appconnect)."</li>";
										}
										$link.="<ul>";
										
										echo $link;
									?>
				    </nav>
				    <!--<div class="search-box-side">
			    		<div class="input-box left">
			    			<input type="text" name="t" id="t-search" class="txt-box" placeHolder="Enter search keyword here..." />
			    		</div>
			    		<div class="left">
			    			<input type="submit" id="b-search" class="btn main-bg" value="GO" />
			    		</div>
			    	</div>-->
			    	<div class="side-head-block">
			    		<ul class="blocks">
						    <li><a href="#"><i class="fa fa-envelope"></i>info@mapolyaccountancydept.com.ng</a></li>
						    <!--<li><span><i class="fa fa-phone"></i> Call Us: +1 (888) 000-0000</span></li>-->
					    </ul>
			    	</div>
			    	<!--<div class="side-head-block">
			    		<ul class="social-list hover_links_effect">
						    <li><a href="#" data-title="facebook" data-tooltip="true" data-position="top"><span class="fa fa-facebook"></span></a></li>
						    <li><a href="#" data-title="linkedin" data-tooltip="true" data-position="top"><span class="fa fa-linkedin"></span></a></li>
						    <li><a href="#" data-title="skype" data-tooltip="true" data-position="top"><span class="fa fa-skype"></span></a></li>
						    <li><a href="#" data-title="twitter" data-tooltip="true" data-position="top"><span class="fa fa-twitter"></span></a></li>
						    <li><a href="#" data-title="YouTube" data-tooltip="true" data-position="top"><span class="fa fa-youtube"></span></a></li>
					    </ul>
			    	</div-->>
			    </header>
			    <!-- Logo, Global navigation menu and search end -->
			    
			</div>
			<!-- Header End -->
			 <?php 
				
				$brow = mysqli_fetch_assoc($br);
				$img = $brow['image-name'];
				
				if($img == "")
				{
					$image = "images/page-titles/Page-title-1.jpg";	
				}
				else
				{
					$image = "uploads/".$img;	
				}
			
			?>
			<!-- Content Start -->
			<div id="contentWrapper">
				<div class="page-title title-1" style="background: #fff url('<?php echo $image;?>') no-repeat 50% 50%;">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Create <span>Account</span></h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="<?php echo "http://".$_SERVER['HTTP_HOST'];?>">Home</a><span class="line-separate">/</span><span>Create account</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
                        <div class="box success-box fx" data-animate="fadeInRight">
  <!--<h3>Account Verified</h3>-->
  <p style="font-weight:bold;">
							<h4>NB: Matric Number should be written in this form <a href="#">00/000/0000</a> without space.</h4>
												
</p>
</div>
							<div class="cell-7 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Student Registration Form</h3>
			    				<form action="<?php echo 'processstudentinfo.php';?>"  method="post" id="reg_form">
			    					<div class="form-input">
			    						<label>Surname<span class="red">*</span></label><input name="sname" type="text" required id="sname">
			    					</div>
			    					<div class="form-input">
			    						<label>Othername<span class="red">*</span></label><input name="oname" type="text" required id="oname">
			    					</div>
			    					<div class="form-input">
			    						<label>Phone Number<span class="red">*</span></label><input name="phone" type="text" required id="phone">
			    					</div>
			    					<div class="form-input">
			    						<label>Email<span class="red">*</span></label><input name="email" type="email" required id="email">
			    					</div>
			    					<div class="form-input">
			    						<label>Matric. No.:<span class="red">*</span></label><input name="matric" type="text" required id="matric" placeholder="00/000/0000">
			    					</div>
                                    
                                    
		    					  <!--<div class="form-input">
			    					  <label>Camp Arrival Day<span class="red">*</span></label>
			    					  <input name="campday" type="text" required id="campday">
		    					  </div>-->
		    					  <div class="form-input">
		    						  <input type="submit" class="btn btn-large main-bg" value="Submit">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset">
			    					</div>
			    				</form>
			    			</div>
			    			
				    		<!--<div class="cell-5 fx padd-top-35" data-animate="fadeInRight">
				    			<div class="notices">
									<div class="box warning-box fx" data-animate="fadeInRight">
										<h3>You need to know:</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
									</div>
									<p class="fx" data-animate="fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
									<p class="fx" data-animate="fadeInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
								</div>
				    			<ul id="accordion" class="accordion">
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">How Can i register in the site ?</span></a></h3>
										<div class="accordion-panel active">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet. In interdum nisl sapien, vel dignissim nulla porta at. Sed accumsan nunc vitae mollis consequat. Morbi velit risus, ultrices vitae sodales ac, aliquam id eros.
											Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi amet dapibus dolor diam viverra mi. Aenean porttitor.
											Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi amet dapibus dolor diam viverra mi. Aenean porttitor, lectus at dapibus egestas.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">Can i change my profile ?</span></a></h3>
										<div class="accordion-panel">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.
									Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">How can i change my details ?</span></a></h3>
										<div class="accordion-panel">
											 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.
									Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">What is Exception policy ?</span></a></h3>
										<div class="accordion-panel">
											 Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">What are the paymeny methods can i use ?</span></a></h3>
										<div class="accordion-panel">
											 Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										</div>
									</li>
								</ul>
			    			</div>-->
		    			
						</div>
					</div>
				</div>
				
			</div>
														
							<!-- right devices image start
							<div class="cell-4 fx" data-animate="flipInX">
								<div class="padd-top-25 center">
									<img alt="" src="images/devices.png">
								</div>
							</div>
							<!-- right devices image end 
							
						</div>
					</div>
				</div>
				<!-- Responsive Design end -->				
			</div>
			<!-- Content End -->
			
			<!-- Footer start -->
			<footer id="footWrapper">
			  <!-- footer bottom bar start -->
			  <div class="footer-bottom minimal-foot">
			    <div class="container">
			      <div class="row">
			        <!-- footer copyrights left cell -->
			        <div class="copyrights cell-12"> &copy; Copyrights <b>Accountancy Department, MAPOLY</b> 2021-<?php echo date("Y");?>. All rights reserved.
			          <div class="clearfix"></div>
			          <!--<ul class="social-list padd-top-15 hover_links_effect">
			            <li><a href="https://www.facebook.com/TCBCYM/" data-title="facebook" data-tooltip="true" data-position="top"><span class="fa fa-facebook"></span></a></li>
			            <li><a href="https://twitter.com/tcbcym" data-title="twitter" data-tooltip="true" data-position="top"><span class="fa fa-twitter"></span></a></li>
			            <li><a href="https://instagram.com/tcbcym" data-title="instagram" data-tooltip="true" data-position="top" target="_blank"><span class="fa fa-instagram"></span></a></li>                        
                        <li><a href="https://www.youtube.com/channel/UCAI7nfYq32a_BLdRFJhMG6A" data-title="youtube" data-tooltip="true" data-position="top"><span class="fa fa-youtube"></span></a></li>
		              </ul>-->
		            </div>
			        <!-- footer social links right cell start
			        <div class="cell-7"></div>
			        <!-- footer social links right cell end -->
		          </div>
		        </div>
		      </div>
			  <!-- footer bottom bar end -->
		  </footer>
			<!-- Footer end -->
		    
			<!-- Back to top Link -->
		  <div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
		    
	    </div>
	    

	    <!-- Load JS siles -->	
 		<script type="text/javascript" src="js/jquery.min.js"></script>
	    
	    <!-- Waypoints script -->
		<script type="text/javascript" src="js/waypoints.min.js"></script>
		
		<!-- SLIDER REVOLUTION SCRIPTS  -->
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>
		
		<!-- slick slider carousel -->
		<script type="text/javascript" src="js/slick.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
		
		<!-- PrettyPhoto script -->
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		
		<!-- Share post plugin script -->
		<script type="text/javascript" src="js/jquery.sharrre.min.js"></script>
		
		<!-- Product images zoom plugin -->
		<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		
		<!-- Input placeholder plugin -->
		<script type="text/javascript" src="js/jquery.placeholder.js"></script>
		
		<!-- Tweeter API plugin -->
		<script type="text/javascript" src="js/twitterfeed.js"></script>
		
		<!-- Flickr API plugin -->
		<script type="text/javascript" src="js/jflickrfeed.min.js"></script>

		<!-- MailChimp plugin -->
		<script type="text/javascript" src="js/mailChimp.js"></script>
		
		<!-- NiceScroll plugin -->
		<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
		
		<!-- general script file -->
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>