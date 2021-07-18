<?php 	include('includes/header.php');

		$username=$password=$ref=$msg="";
		$usernameErr=$passwordErr="";


		//Has user login?

		if(loggedin())
			{
				echo '<script language="JavaScript">

									window.location.href="mydashboard.php";

				</script>';
			}

		// Is Login button clicked?

		if (isset($_POST['submit']) and $_POST['submit'] == "Recover") {
			//Clean the date supplied and also prevent malicious inputs
			$username = CleanData($_POST["uname"]);
			//$password = CleanData($_POST["pwd"]);
			
			if(empty($username)) {

        		$usernameErr = "Username is required for login";
      		}
      		elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        				$usernameErr = "Invalid email format";
      		}
			else
    		{
				$Q = "select * from sellers where `email`='$username'";
				$r = mysqli_query($appconnect, $Q) or die(mysqli_error($appconnect));
				
				$n = mysqli_num_rows($r);
				
				if($n == 0)
				{
					echo '<script language="JavaScript">

						alert("Account is not available!");

						window.location.href="accountrecovery.php";

						</script>';
				}
				else
				{
					$row = mysqli_fetch_assoc($r);
					$ref = rand(10,99999999);
					$ref1 = $ref;
					
					$uq = "update sellers set `password`='".md5($ref)."' where sellersID=".$row['sellersID'];
					mysqli_query($appconnect, $uq);
					
						echo '<script language="JavaScript">

						alert("Password Reset Was Successful!\nYour new Password is:\n'.$ref1.'");

						window.location.href="login.php";

						</script>';
				}
			}
		}
		
		

?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
		    <div class="cell-7 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Account Recovery</h3>
			    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" id="reg_form">
									<span style="color: red; font-size: 25px; font-weight: bolder;"><?php echo $msg;?></span>
			    					<div class="form-input">
			    						<label>Email:<span class="red">* <?php echo $usernameErr;?></span></label><input name="uname" type="text" required id="uname" placeholder="Enter your Email" value="<?php echo $username;?>">
			    					</div>
			    					
			    					<div class="form-input">
		    						  <input type="submit" class="btn btn-large main-bg" value="Recover" name="submit">
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