<?php
include "config.php";
?>

<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
								<div class="panel-group category-products" id="accordian">
									<?php
						
									$res = mysqli_query($link,"select distinct(category) from product;");
								
									while($row = mysqli_fetch_array($res))
									{
										?>
											<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a href="shop.php?cat=<?php echo $row["category"]; ?>"><?php echo $row["category"]; ?></a></h4>
											</div>
											</div>							
										<?php
									}
						
									?>
								</div>
					</div>
				</div>