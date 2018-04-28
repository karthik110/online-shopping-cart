<?php

include "config.php";
include "header.php";

if(!isset($_SESSION["user_id"]))
{
	?>
		<script type="text/javascript">window.location = "shop.php"</script>
	<?php		
}

?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active"><?php echo $_SESSION["user_name"]; ?></li>
				</ol>
			</div>
			
			
			
			
			
			<?php
				
				$gettable = mysqli_query($link,"select * from checkout where user_id=$_SESSION[user_id] order by id desc;");
				$flag=false;
				
				while($getrow = mysqli_fetch_array($gettable))
				{
					$flag=true;
					$shopped_id = $getrow["id"];
					?>
					<div style="padding-bottom:12px" class="table-responsive cart_info">
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
						
						$gettable2 = mysqli_query($link,"select * from shopped_products where order_id = $shopped_id;");
						while($getrow2 = mysqli_fetch_array($gettable2))
						{
							$totalCost += $getrow2["total"];
							?>
									<tr>
										<td class="cart_product">
											<a href="product-details.php?id=<?php echo "1"; ?>"><img src="admin/<?php echo $getrow2["image"]; ?>" width="100" height="100" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="product-details.php?id=<?php echo $get[5]; ?>"><?php echo $getrow2["name"]; ?></a></h4>
										</td>
										<td class="cart_price">
											<p>Rs. <?php echo $getrow2["price"]; ?></p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<input readonly class="cart_quantity_input" type="text" name="quantity" value="<?php echo $getrow2["quantity"]; ?>" autocomplete="off" size="2">
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">Rs. <?php echo $getrow2["total"]; ?></p>
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
					</div>
					<?php
				}
				if(!$flag)
				{
					?>
						<h3 class=" text-center" style="color:#fe980f;"><?php echo "no product in cart to display"; ?></h3>
					<?php
				}
				
				if(isset($_COOKIE["item"]) && is_array($_COOKIE["item"]))
				{
									}
				else
				{
					?>
						<h3 class=" text-center" style="color:#fe980f;"><?php echo "no product in cart to display"; ?></h3>
					<?php
				}
				
			?>
					
			
		</div>
		
	</section> <!--/#cart_items-->

<?php
	include "footer.php";
?>