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


				$sn = 0;


				  $query = "select * from products where sellersID=".$_SESSION['user_id'];

				  $result = mysqli_query($appconnect, $query) or die(mysqli_error($appconnect));


?>	
			
			<!-- Content Start -->
		  <div id="contentWrapper">
				
				<!-- Revolution slider start -->
	        <div class="container">
		      <h3 class="block-head">My Products</h3>
		      <table width="75%" border="0">
				      <tbody>
				        <tr>
				          <th width="4%">SN</th>
				          <th width="40%">Product Name</th>
				          <th width="15%">Price</th>
				          <th width="26%">Image</th>
				          <th colspan="2">Action</th>
			            </tr>
						<?php while($row = mysqli_fetch_assoc($result)){?>  
				        <tr>
				          <td><?php echo ++$sn;?></td>
				          <td><?php echo $row['pname'];?></td>
				          <td><?php echo $row['price'];?></td>
				          <td><img src="upload/<?php echo $row['image'];?>" height="200" width="200"></td>
				          <td width="7%" align="center"><a href="editproduct.php?pid=<?php echo $row["productsID"]; ?>"><img src="images/edit.png"></a></td>
				          <td width="8%" align="center"><a href="javascript:delArticle('<?php echo $row["productsID"]; ?>','<?php echo $row["pname"]; ?>');"><img src="images/del.png"></a></td>
			            </tr>
						<?php }?>
				        
		        </tbody>
		      </table>
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