<?php include('includes/header.php');

//Has user login?

		if(loggedin())
			{
				echo '<script language="JavaScript">

									window.location.href="mydashboard.php";

				</script>';
			}


// Setting all variable empty
$nameErr = $emailErr = $phoneErr = $pwdErr = $pwdErr2 ="";
$name = $email = $phone = $pwd = $pwd2 = "";

//is the Register button clicked?
if (isset($_POST['submit']) and $_POST['submit'] == "Register") {
	
	
    //Clean the date supplied and also prevent malicious inputs
    $name = CleanData($_POST["name"]);
    $email = CleanData($_POST["email"]);
    $phone = CleanData($_POST["phone"]);
    $pwd = CleanData($_POST["pwd"]);
    $pwd2 = CleanData($_POST["cpwd"]);	


//Validating the data supplied 

  if (empty($name)) {
    $nameErr = "Name is required";
  } 
  elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
  }
  elseif (empty($email)) {

    $emailErr = "Email is required";
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  elseif(findEmail($email, $appconnect))
  {
	  $emailErr = "Email provided is available!";
  }
  elseif (empty($pwd)) {
    $pwdErr = "Password is required";
  } 
  elseif (empty($pwd2) or $pwd2!= $pwd) {
    $pwdErr2 = "Confirm password is either empty or not same as the first password supplied";
  } else {
	  
	  $query = "insert into sellers values(NULL, '$name', '$phone', '$email','".md5($pwd)."', NOW())";
	  
	  mysqli_query($appconnect, $query) or die(mysqli_error($appconnect));
	  
	  echo '<script language="JavaScript">
	  
	  		alert("Registration was successful!\n Proceed to login into your Dashboard!");
				
			window.location.href="login.php";
					
	</script>';
	  
	  // Setting used variable empty again
    $nameErr = $emailErr = $pwdErr = $pwdErr2 ="";
    $name = $email = $pwd = $pwd2 = "";
	  
  }

}


?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
		    <div class="cell-7 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Seller's Registration</h3>
			    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" id="reg_form">
			    					<div class="form-input">
			    						<label>Full Name:<span class="red">*<?php echo $nameErr;?></span></label><input name="name" type="text" required id="name" value="<?php echo $name;?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Phone Number:<span class="red">*</span></label><input name="phone" type="text" required id="phone" value="<?php echo $phone?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Email:<span class="red">* <?php echo $emailErr;?></span></label><input name="email" type="email" required id="email" value="<?php echo $email;?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Password<span class="red">*<?php echo $pwdErr;?></span></label><input name="pwd" type="password" required id="pwd">
			    					</div>
			    					<div class="form-input">
			    						<label>Confirm Password:<span class="red">*<?php echo $pwdErr2;?></span></label><input name="cpwd" type="password" required id="cpwd">
			    					</div>
                                    
                                    
		    					  <!--<div class="form-input">
			    					  <label>Camp Arrival Day<span class="red">*</span></label>
			    					  <input name="campday" type="text" required id="campday">
		    					  </div>-->
		    					  <div class="form-input">
		    						  <input type="submit" class="btn btn-large main-bg"  name="submit" value="Register">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset">
			    					</div>
			    				</form>
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