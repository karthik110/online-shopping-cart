<?php
	include "config.php";
	include "header.php";
	
	if(isset($_GET["cat"]))
		$cat=$_GET["cat"];
	?>
		<section>
			<div class="container">
				<div class="row">
	<?php
	include "menu.php";
	include "pagination/function.php";
?>						
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">PRODUCTS</h2>
						
						<?php
						
						$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
						$limit = 5;
						$startpoint = ($page * $limit) - $limit;
						
						
						if(isset($_GET["cat"]))
						{
							$result = mysqli_query($link,"select * from product where category='$cat';");
						}
						else
							$result = mysqli_query($link,"select * from product LIMIT $startpoint, $limit");
						
						while($row = mysqli_fetch_array( $result ))
						{
							?>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/<?php echo $row["image"]; ?>" alt="" width="268" height="249" />
										<h2><?php echo "Rs. ",$row["price"]; ?></h2>
										<p style="font-weight:bold"><?php echo $row["name"]; ?></p>
										<p><?php echo $row["category"]; ?></p>
										<a href="product-details.php?id= <?php echo $row["id"]; ?> " class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<img src="admin/<?php echo $row["image"]; ?>" alt="" width="268" height="249" />
											<h2><?php echo "Rs. ",$row["price"]; ?></h2>
											<p style="font-weight:bold"><?php echo $row["name"]; ?></p>
											<p><?php echo $row["category"]; ?></p>
											<a href="product-details.php?id= <?php echo $row["id"]; ?> " class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
							<?php
						} 
						
						?>

					</div>
						<?php
						if(!isset($_GET["cat"]))
						{
							?>
							<ul class="pagination">
								<?php
									echo pagination("product",$limit,$page);
								?>
							</ul>
							<?php
						}
						?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php
include "footer.php";
?>