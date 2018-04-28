<?php
	include "config.php";
	
	if(isset($_POST["submit+"]))
	{
		$_SESSION["inc_dec"]=1;
		$id = $_POST["id"];
		include "add-to-cart.php";
		?>
			<script type="text/javascript">window.location.href=window.location.href;</script>
		<?php
	}
	
	if(isset($_POST["submit-"]))
	{
		$_SESSION["inc_dec"]=-1;
		$id = $_POST["id"];
		include "add-to-cart.php";
		?>
			<script type="text/javascript">window.location.href=window.location.href;</script>
		<?php
	}
	
	if(isset($_GET['a']))
	{
		if(isset($_COOKIE['item']) && is_array($_COOKIE['item']))
		{
			foreach($_COOKIE['item'] as $name => $value )
			{
				$get = explode("__",$value);
				if($get[5]==$_GET['a'])
				{
					setcookie("item[$name]","",time()-1800);
					?>
						<script>
							window.location.href = window.location.href;
						</script>
					<?php
				}
			}
		}
	}
	include "header.php";
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
											<a class="cart_quantity_up" href="">
											<form method="post">
												<input type="hidden" name="id" value="<?php echo $get[5]; ?>" />
												<input class="mybutton" type="submit" name="submit+" value="+"/>
											</form>
											</a>
											<input class="cart_quantity_input" readonly type="text" name="quantity" value="<?php echo $get[3]; ?>" autocomplete="off" size="2">
											<a class="cart_quantity_down" href="">
											<form method="post">
												<input type="hidden" name="id" value="<?php echo $get[5]; ?>" />
												<input class="mybutton" type="submit" name="submit-" value="-"/>
											</form>
											</a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">Rs. <?php echo $get[4]; ?></p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="cart.php?a=<?php echo $get[5];?>"><i class="fa fa-times"></i></a>
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
					<a href="checkout.php"><input class="center-block btn add-to-cart" style="border-color:#000000;" type="button" value="checkout"/></a>
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