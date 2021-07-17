<?php 
//namespace Verot\Upload;
include('includes/header.php');
//include('src/class.upload.php');

//Has user login?

		if(!loggedin())
			{
				echo '<script language="JavaScript">

									window.location.href="login.php";

				</script>';
			}


// Setting all variable empty
$nameErr = $priceErr = $descErr = $imgErr = "";
$name = $price = $desc = $img= "";

//is the Register button clicked?
if (isset($_POST['submit']) and $_POST['submit'] == "Upload") {
	
	
    //Clean the date supplied and also prevent malicious inputs
    $name = CleanData($_POST["name"]);
    $price = CleanData($_POST["price"]);
    $desc = CleanData($_POST["desc"]);
    $img = CleanData($_FILES["img"]['name']);
    //$pwd2 = CleanData($_POST["cpwd"]);	


//Validating the data supplied 

  if (empty($name)) {
    $nameErr = "Product name is required";
  } 
  elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
  }
  elseif(findProduct($name, $appconnect))
  {
	  $nameErr = "Product name already exist!";
  }
  elseif (!is_numeric($price)) {
    $priceErr = "Valid Product price is required";
  } 
  elseif (empty($desc)) {
    $descErr = "Provide short description of your product";
  }
  elseif($_FILES['img']['name'] == "" or !validatefile($_FILES))
  {				
			$imgErr = "Wrong image format for upload!";
  }
else {
	
				$tmpName = $_FILES['img']['tmp_name'];
					
					//$data = addslashes(file_get_contents($tmpName));
								
				$File_Name          = strtolower($img);
				$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
				$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
				$NewFileName 		= $Random_Number.$File_Ext; //new file name	
				$UploadDirectory = "upload/";
	
				
				  move_uploaded_file($tmpName, $UploadDirectory.$NewFileName);

				  $query = "insert into products values(NULL, '$name', '$price', '$desc','$NewFileName', '".$_SESSION['user_id']."')";

				  mysqli_query($appconnect, $query) or die(mysqli_error($appconnect));
	
				 // Setting used variable empty again
				$nameErr = $priceErr = $descErr = $imgErr ="";
				$name = $price = $desc = $img = "";

				  echo '<script language="JavaScript">

						alert("New Product info was successfully created!");

						window.location.href="manageProduct.php";

				</script>';

				 
	}
	  
  

}


?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
		    <div class="cell-7 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Product Registration</h3>
			    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" id="reg_form" enctype="multipart/form-data">
			    					<div class="form-input">
			    						<label>Product Name:<span class="red">*<?php echo $nameErr;?></span></label><input name="name" type="text" required id="name" value="<?php echo $name;?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Price:<span class="red">*<?php echo $priceErr;?></span></label><input name="price" type="number" required id="price" value="<?php echo $price?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Description:<span class="red">* <?php echo $descErr;?></span></label><textarea name="desc" id="desc"><?php echo $desc;?></textarea>
			    					</div>
			    					<div class="form-input">
			    						<label>Product Image<span class="red">*<?php echo $imgErr;?></span></label><input name="img" type="file" required id="img">
			    					</div>
			    					
		    					  <div class="form-input">
		    						  <input type="submit" class="btn btn-large main-bg"  name="submit" value="Upload">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset">
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