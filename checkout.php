<?php
	include "config.php";
	include "header.php";
	if(!isset($_SESSION["user_id"]))
	{
		?>
		<script type="text/javascript">window.location="login.php";</script>
		<?php
	}
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div>
			<!--/breadcrums-->


			<div class="shopper-informations">
				<div class=" row">
					<div class="clearfix">
						<div class="bill-to">
							<center><p>Bill To</p></center>
							<div class="form-one">
								<form name="form" action="" method="post">
									<input type="text" name="firstname" required pattern="[A-Za-z]+" title="only alphabets [ A-Z a-z ]" placeholder="First Name">
									<input type="text" name="lastname" required pattern="[A-Za-z]+" title="only alphabets [ A-Z a-z ]" placeholder="Last Name">
									<input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9._]+\.[a-z]{2,3}$" placeholder="Email">
									<input type="text" name="address" required placeholder="Address">
									<input type="text" name="city" required pattern="[A-Za-z]+" title="only alphabets [ A-Z a-z ]" placeholder="City">
									<input type="text" name="pincode" required pattern="[0-9]{6}" title="only numbers of length 6" placeholder="Pincode">
									<input type="text" name="contact" required pattern="[0-9]{10}" title="only numbers of length 10" placeholder="Contact Number">
									<input class="btn btn-default add-to-cart" style="margin-left:20%; margin-right:20%; width:60%;" type="submit" value="pay" name="submit">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			
			<?php
			if(isset($_POST["submit"]))
			{
				$res=mysqli_query($link,"insert into checkout(user_id,firstname,lastname,email,address,city,pincode,contact) values('$_SESSION[user_id]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[address]', '$_POST[city]', '$_POST[pincode]', '$_POST[contact]');");

						if($res)
						{
							?> 
								<script type="text/javascript"> alert("payment done successfully"); </script>
								<?php
								$q = mysqli_query($link, " select * from checkout order by id desc; ");
								
								while($row = mysqli_fetch_array($q))
								{
									$_SESSION["order_id"]=$row["id"];
									break;
								}
								?>
							    <script type="text/javascript"> window.location = "payment.php"; </script>
							<?php
						}
						else
						{
							echo "no".mysqli_error($link);
						}
			}
			?>
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			
			<div style="padding-bottom:12px" class="table-responsive cart_info">
			
			<?php
				
				if(isset($_COOKIE["item"]) && is_array($_COOKIE["item"]))
				{
					?>
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description">Name</td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
					<?php
					$totalCost=0;
					foreach( $_COOKIE["item"] as $name => $value )
					{
						$get = explode( "__" , $value );
						$totalCost=$totalCost+$get[4];
						?>
								<tr>
									<td class="cart_product">
										<a href="product-details.php?id=<?php echo $get[5]; ?>"><img src="admin/<?php echo $get[0]; ?>" width="100" height="100" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href="product-details.php?id=<?php echo $get[5]; ?>"><?php echo $get[1]; ?></a></h4>
									</td>
									<td class="cart_price">
										<p>Rs. <?php echo $get[2]; ?></p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<input readonly class="cart_quantity_input" type="text" name="quantity" value="<?php echo $get[3]; ?>" autocomplete="off" size="2">
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">Rs. <?php echo $get[4]; ?></p>
									</td>
								</tr>
						<?php
					}
					?>
					<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rs. <?php echo $totalCost; ?></td>
									</tr>
									<tr>
										<td>GST Tax ( 2% )</td>
										<td>Rs. <?php 
											$tax = round(($totalCost*2)/100);
											echo $tax;
										 ?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>Rs. <?php echo $tax+$totalCost; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
						</tbody>
					</table>
					<?php
				}
				else
				{
					?>
						<h3 class=" text-center" style="color:#fe980f;"><?php echo "no product in cart to display"; ?></h3>
					<?php
				}
				
			?>
					
			</div>
			
			
		</div>
	</section> <!--/#cart_items-->

<?php
	include "footer.php";
?>