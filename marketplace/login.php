<?php 	include('includes/header.php');
		$username=$password=$msg="";
		$usernameErr=$passwordErr="";


		//Has user login?

		if(loggedin())
			{
				echo '<script language="JavaScript">

									window.location.href="mydashboard.php";

				</script>';
			}

		// Is Login button clicked?

		if (isset($_POST['submit']) and $_POST['submit'] == "Login") {
			//Clean the date supplied and also prevent malicious inputs
			$username = CleanData($_POST["uname"]);
			$password = CleanData($_POST["pwd"]);
			
			if(empty($username)) {

        		$usernameErr = "Username is required for login";
      		}
      		elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        				$usernameErr = "Invalid email format";
      		}
			else
    		{
				$loginResult = Processlogin($username, $password, $appconnect);
				
				if($loginResult == false)
				{
					$msg = "Authentication Failed!";
				}
				else
				{
						echo '<script language="JavaScript">

						alert("Authentication was successful!");

						window.location.href="mydashboard.php";

						</script>';
				}
			}
		}
		
		

?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
		    <div class="cell-7 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Login</h3>
			    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" id="reg_form">
									<span style="color: red; font-size: 25px; font-weight: bolder;"><?php echo $msg;?></span>
			    					<div class="form-input">
			    						<label>Username:<span class="red">* <?php echo $usernameErr;?></span></label><input name="uname" type="text" required id="uname" placeholder="Enter your Email" value="<?php echo $username;?>">
			    					</div>
			    					
			    					<div class="form-input">
			    						<label>Password<span class="red">*</span></label><input name="pwd" type="password" required id="pwd">
			    					</div>
			    					                                   
                                    
		    					  <div class="cell-2">Forgot your password? Click <a href="accountrecovery.php">here</a></div>
		    					  <div class="form-input">
		    						  <input type="submit" class="btn btn-large main-bg" value="Login" name="submit">
			    					</div>
			    				</form>
			    			</div>
			  
								<!-- Responsive Web Design end -->
								
		  </div>
														
										
			</div>
			<!-- Content End -->
		<?php include('includes/footer.php');?>	

	</body>
</html>