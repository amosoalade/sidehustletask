<?php ob_start(); session_start();	
	include("includes/functions.php");
	include("includes/sanitize.php");	
	$appconnect=connect();
	
	if(!loggedin())
	{
echo '<script language="JavaScript">
				
			window.location.href="portallogin.php";
					
	</script>';
	}
	

$detail = getStudentDetail($_SESSION['student_userID'], $appconnect);


// Registration Step 2

	
if($_SESSION['examno']== "" and $_SESSION['student_prgm'] == 0 and $_SESSION['student_prgmode']==0 and $_SESSION['student_lv'] ==0)
{
	echo '<script language="JavaScript">
				
			window.location.href="student-info-2.php";
					
	</script>';
}


//Registration Step 3

if($detail['day'] == 0 and $detail['month'] ==0 and $detail['year'] ==0 and $detail['sex']==0 and $detail['religion'] == "" and $detail['stateID'] == 0 and $detail['lgID'] == 0 and $detail['resident']=="")
{
	echo '<script language="JavaScript">
				
			window.location.href="student-info-3.php";
					
	</script>';
}


//Registration Step 4

if($detail['nok'] == "" and $detail['nokphone'] =="" and $detail['nokadd'] =="" and $detail['pname']=="" and $detail['pphone'] == "" and $detail['padd'] == "")
{
	echo '<script language="JavaScript">
				
			window.location.href="student-info-4.php";
					
	</script>';
}


//Resgistration Step 5
if($detail['sec'] == "" and $detail['fsec'] =="" and $detail['tsec'] =="" and $detail['pry']=="" and $detail['fpry'] == "" and $detail['tpry'] == "")
{
echo '<script language="JavaScript">
				
			window.location.href="student-info-5.php";
					
	</script>';
}

	if($_SESSION['student_payment_status'] == 0)
	{
		echo '<script language="JavaScript">
				
			window.location.href="paymentpreview-1.php";
					
	</script>';
	}

	
	
	$img = $_SESSION['student_pic'];
	
	if($img == "")
	{
		$image = "images/avarta.png";	
	}
	else
	{
		$image = "uploads/student-passport/".$img;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php if(isset($_SESSION['student_user_name'])){echo "Welcome ".$_SESSION['student_user_name'];}?></title>
		<meta name="description" content="">
		<meta name="author" content="">
		
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
				
/*				$brow = mysqli_fetch_assoc($br);
				$img = $brow['image-name'];
				
				if($img == "")
				{
					$image = "images/page-titles/Page-title-1.jpg";	
				}
				else
				{
					$image = "uploads/".$img;	
				}*/
			
			?>
			<!-- Content Start -->
			<div id="contentWrapper">
				<div class="sectionWrapper" style="padding-top: 5px;">
					<div class="container">
						<div class="my-img">
							<div class="my-details">
								<img class="fx" data-animate="fadeInLeft" alt="" src="<?php echo $image;?>">
								<h4 class="bold main-color my-name fx" data-animate="slideInDown"><?php if(isset($_SESSION['student_user_name'])){echo $_SESSION['student_user_name'];} ?></h4>
								<ul class="list alt list-bookmark cell-4">
									<li class="fx" data-animate="slideInDown"><?php echo $_SESSION['student_username'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="100"><?php echo $_SESSION['student_mail'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="200"><?php echo $_SESSION['student_phone_number'];?></li>
								</ul>
								<ul class="list alt list-bookmark cell-4">
									<li class="fx" data-animate="slideInDown" data-animation-delay="300"><?php $prgD = getProgrammeDetail($_SESSION['student_prgm'], $appconnect); echo $prgD['programmename'];?></li>
									
									<li class="fx" data-animate="slideInDown" data-animation-delay="400"><?php $prgM = getProgrammemodeDetail($_SESSION['student_prgmode'], $appconnect); echo $prgM['programmemodename'];?></li>
									
									<li class="fx" data-animate="slideInDown" data-animation-delay="500"><?php $lvD = getLevelDetail($_SESSION['student_lv'], $appconnect); echo $lvD['levelname'];?></li>
								</ul>
							</div>
						</div>
						
						<div class="container">
						<h3 class="block-head"><i class="fa fa-user"></i>My Portal Activities </h3>
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown">
							<a href="update.php">
							<div class="box-head">
								<i class="icon main-bg fa fa-pencil"></i>
								<h4 class="main-color"><span data-hover="Update Info">Update my info</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
						</div>
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="200">
							<a href="courseregistrationstep-1.php" target="_blank">
							<div class="box-head">
								<i class="icon main-bg fa fa-book"></i>
								<h4 class="main-color"><span data-hover="Course Registration">Course Registration</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="400">
							<a href="student_changepassword.php" target="display">
							<div class="box-head">
								<i class="icon main-bg fa fa-lock"></i>
								<h4 class="main-color"><span data-hover="Change Password">Change Password</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
							
						<?php if(isset($_SESSION['student_payment_status']) and $_SESSION['student_payment_status'] != 0){?>	
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="600">
							<a href="payment-receipt.php?pr=<?php echo encryptParameter($_SESSION['student_userID']); ?>" target="_blank">
							<div class="box-head">
								<i class="icon main-bg fa fa-print"></i>
								<h4 class="main-color"><span data-hover="Print Receipt">Print Receipt</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
						<?php }?>
						
						<?php //$level = getCurrentLevel($_SESSION['student_userID']);
								
								if(getCurrentLevel($_SESSION['student_userID'], $appconnect))
								{					  
						  ?>
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="600">
							
							<a href="student-alumni-registration.php">
							<div class="box-head">
								<i class="icon main-bg fa fa-graduation-cap"></i>
								<h4 class="main-color"><span data-hover="Alumni Registration">Alumni Registration</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
						<?php }?>
							
						<?php //$level = getCurrentLevel($_SESSION['student_userID']);
								
								if(getCurrentLevel($_SESSION['student_userID'], $appconnect))
								{		
									if(!verifyProjectSubmission($_SESSION['student_userID'], $_SESSION['student_prgm'], getCurrentSessionID($appconnect), $appconnect)){			  
						  ?>
							
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="600">
							<a href="projectlogging.php" target="_blank">
							<div class="box-head">
								<i class="icon main-bg fa fa-laptop"></i>
								<h4 class="main-color"><span data-hover="Project Registration">Project Registration</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
							
						<?php }if(verifyProjectSubmission($_SESSION['student_userID'], $_SESSION['student_prgm'], getCurrentSessionID($appconnect), $appconnect)){?>
							
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="600">
							<a href="projectdetail.php" target="_blank">
							<div class="box-head">
								<i class="icon main-bg fa fa-print"></i>
								<h4 class="main-color"><span data-hover="Print Project Detail">Print Project Detail</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
							<?php }}?>
							
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="600">
							
							<a href="viewresultstep-1.php" target="_blank">
							<div class="box-head">
								<i class="icon main-bg fa fa-copy"></i>
								<h4 class="main-color"><span data-hover="My Result">My Result</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
						
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="600">
							<a href="logout.php">
							<div class="box-head">
								<i class="icon main-bg fa fa-sign-out"></i>
								<h4 class="main-color"><span data-hover="Sign Out">Sign Out</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
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