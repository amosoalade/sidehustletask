<?php 
include('includes/header.php');


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

if(isset($_GET['pid']))
	{
		$xter = getUpdateDetail(CleanData($_GET['pid']), "products", "productsID", $appconnect);
	}

//is the Register button clicked?
if (isset($_POST['submit']) and $_POST['submit'] == "Update") {
	
	
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
  elseif (!is_numeric($price)) {
    $priceErr = "Valid Product price is required";
  } 
  elseif (empty($desc)) {
    $descErr = "Provide short description of your product";
  }
  elseif($_FILES['img']['name'] != "" and !validatefile($_FILES))
  {				
			$imgErr = "Wrong image format for upload!";
  }
else {
	
		if($_FILES['img']['name']!="")
		{
			unlink("upload/".$_POST['in']);
			
			$File_Name          = strtolower($_FILES['img']['name']);
			$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
			$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
			$NewFileName 		= $Random_Number.$File_Ext; //new file name										
			$temp = $_FILES['img']['tmp_name'];
			move_uploaded_file($temp, "upload/".$NewFileName);						
		}
		else
		{
			$NewFileName = $_POST['in'];
		}
		
		$q = "update `products` set pname='$name', price='$price',  `description`='".$desc."', `image`='".$NewFileName."' where productsID='".$_POST['recID']."'";
		
		$r = mysqli_query($appconnect, $q) or die(mysqli_error($appconnect));
	
		echo '<script language="JavaScript">

						alert("Product info was successfully updated!");

						window.location.href="viewmyproducts.php";

				</script>';
				 
	}
	  
  

}


?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
		    <div class="cell-7 contact-form fx" data-animate="fadeInLeft">
			    				<h3 class="block-head">Update <?php echo $xter['pname'];?></h3>
			    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" id="reg_form" enctype="multipart/form-data">
			    					<div class="form-input">
			    						<label>Product Name:<span class="red">*<?php echo $nameErr;?></span></label><input name="name" type="text" required id="name" value="<?php echo $xter['pname'];?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Price:<span class="red">*<?php echo $priceErr;?></span></label><input name="price" type="number" required id="price" value="<?php echo $xter['price'];?>">
			    					</div>
			    					<div class="form-input">
			    						<label>Description:<span class="red">* <?php echo $descErr;?></span></label><textarea name="desc" id="desc"><?php echo $xter['description'];?></textarea>
			    					</div>
			    					<div class="form-input">
			    						<label>Product Image<span class="red">*<?php echo $imgErr;?></span></label><input name="img" type="file" id="img">
										<img src="upload/<?php echo $xter['image'];?>" height="250" width="250">
			    					</div>
			    					<input type="hidden" name="recID" id="recID" value="<?php echo $xter['productsID'];?>" />
									
									<input name="in" type="hidden" id="in" value="<?php echo $xter['image'];?>" />
		    					  <div class="form-input">
									 
		    						  <input type="submit" class="btn btn-large main-bg"  name="submit" value="Update">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset">
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