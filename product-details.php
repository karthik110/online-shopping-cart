<?php
	include "config.php";
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		$res=mysqli_query($link,"select * from product where id=$id;");
		if(mysqli_num_rows($res)==0)
		{
			?>
			<script type="text/javascript">
				window.location = "shop.php";
			</script>
			<?php
		}
	}
	else
	{
		$id=-1;
		?>
			<script type="text/javascript">
				window.location = "shop.php";
			</script>
		<?php
	}
	
	if(isset($_POST["submit"]))
	{
		include "add-to-cart.php";
	}
	include "header.php";
?>
	<section>
		<div class="container">
			<div class="row">
<?php
	include "menu.php";
?>			
				<div class="col-sm-9 padding-right">
					<!--/product-details-->
					
					<?php
						$res=mysqli_query($link,"select * from product where id=$id");
						if($res)
						while($row=mysqli_fetch_array($res))
						{
							?>
							
								<div class="product-details"><!--product-details-->
									<div class="col-sm-5">
										<div class="view-product">
											<img src="admin/<?php echo $row["image"]; ?>" alt="" />
											<h3>ZOOM</h3>
									</div>
									<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						
						<form name="form" method="post" action="" >
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row["name"]; ?></h2>
								<p>Web ID: <?php echo $row["id"]; ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>Rs. <?php echo $row["price"]; ?></span>
									<label>Quantity:</label>
									<input type="number" min="1" max="<?php echo $row["quantity"] ?>" <?php if(!$row["quantity"]) {echo "disabled";} ?> name="input_qty" value="1" />
									<button type="submit" name="submit" <?php if(!$row["quantity"]) {echo "disabled";} ?> class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability count :</b>
									<?php echo $row["quantity"]; ?>
								</p>
								<p><b>Availability status :</b>
									<?php
										$qty = $row["quantity"];
										if($qty>0)
										{
										?>
											<label style="color:#00CC00">In Stock</label>
										<?php
										}
										else
										{
										?>
											<label style="color:#FF0000">Out of Stock</label>
										<?php
										}
									?>
								</p>
								<p><b>Condition:</b> New</p>
							</div><!--/product-information-->
						</div>
						
						</form>
						
					</div>
							
							<?php
						}
					?>
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Description</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
				</div>
			</div>
		</div>
	</section>

<?php
	include "footer.php";
?>