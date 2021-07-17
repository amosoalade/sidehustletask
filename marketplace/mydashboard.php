<?php include('includes/header.php');

if(!loggedin())
	{
		echo '<script language="JavaScript">

					window.location.href="login.php";

			</script>';
	}
?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
		    <div class="container">
						<h3 class="block-head"><i class="fa fa-user"></i>My Dashboard Activities </h3>
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown">
							<a href="manageProduct.php">
							<div class="box-head">
								<i class="icon main-bg fa fa-gift"></i>
								<h4 class="main-color"><span data-hover="Manage Product">Add New Product</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
						</div>
				
						<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="400">
							<a href="viewmyproducts.php" target="display">
							<div class="box-head">
								<i class="icon main-bg fa fa-pencil"></i>
								<h4 class="main-color"><span data-hover="Manage My Products">Manage My Products</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>
						
						<!--<div class="cell-3 service-box-3 fx" data-animate="fadeInDown" data-animation-delay="400">
							<a href="changepassword.php" target="display">
							<div class="box-head">
								<i class="icon main-bg fa fa-lock"></i>
								<h4 class="main-color"><span data-hover="Change Password">Change Password</span></h4>
							</div>
							</a>
							<div class="clearfix"></div>
							
						</div>-->
										
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
			  <!-- Revolution slider end -->
				
			  <!-- Welcome Box start --><!-- Welcome Box end -->
				
			  <!-- Services boxes style 1 start --><!-- Services boxes style 1 start -->
				
			  <!-- About us and Features container start --><!-- About us and Features container end -->
				
			  <!-- our clients block start -->
			  <!--<div class="sectionWrapper gry-bg">
					<div class="container">
							<h3 class="block-head">Our Clients</h3>
							<div class="clients">
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-1.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-2.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-3.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-4.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-5.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-6.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-7.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-8.png"></a>
								</div>
								<div>
									<a class="white-bg" href="#"><img alt="" src="images/clients/client-9.png"></a>
								</div>
							</div>
					</div>
				</div>-->
			  <!-- our clients block end -->
				
			  <!-- Responsive Design start 
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
							<div class="cell-8">
								
								<!-- Responsive Web Design start 
								<div class="fx" data-animate="fadeInLeft">
									<h3 class="block-head">Responsive Web Design</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.
									Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectet urapibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<ul class="list alt list-ok">
										<li class="fx" data-animate="fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesque</li>
										<li class="fx" data-animate="fadeInLeft" data-animation-delay="200">Suspendisse hendrerit id lacus id lobortis vestibulum quam elit</li>
										<li class="fx" data-animate="fadeInLeft" data-animation-delay="400">Fusce scelerisque pellentesqu suspendisse elementum adipiscing</li>
										<li class="fx" data-animate="fadeInLeft" data-animation-delay="600">Feugiat sodales pretium massa euismod tempus suspendisse hendrerit</li>
									</ul>
								</div>
								<!-- Responsive Web Design end -->
								
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
		<?php include('includes/footer.php');?>	

	</body>
</html>