<?php
session_start();
if(!isset($_SESSION["admin"]) || $_SESSION["admin"]=="")
{
	?>
	
	<script type="text/javascript">
		window.location="login.php";
	</script>
	
	<?php
}
include "config.php";
include "header.php";
?>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

				<?php
					$res = mysqli_query($link,"select * from checkout");
					if($res)
					{
						?>
						<div class="limiter">
							<div class="container-table100">
								<div class="wrap-table100">
									<div class="table100">
										<table>
											<thead>
												<tr class="table100-head">
													<th class="column1">ID</th>
													<th class="column2">FIRST NAME</th>
													<th class="column3">LAST NAME</th>
													<th class="column4">EMAIL</th>
													<th class="column5">ADDRESS</th>
													<th class="column6">CITY</th>
													<th class="column7">CONTACT</th>
													<th class="column8">ACTIONS</th>
												</tr>
											</thead>
											<tbody>
											<?php
											while($row = mysqli_fetch_array($res))
											{
												?>
													<tr>
														<td class="column1"><?php echo $row["id"]; ?></td>
														<td class="column2"><?php echo $row["firstname"]; ?></td>
														<td class="column3"><?php echo $row["lastname"]; ?></td>
														<td class="column4"><?php echo $row["email"]; ?></td>
														<td class="column5"><?php echo $row["address"]; ?></td>
														<td class="column6"><?php echo $row["city"]; ?></td>
														<td class="column7"><?php echo $row["contact"]; ?></td>
														<td class="column8"><a href="vieworder.php?id=<?php echo $row["id"]; ?>">view_order</a></td>
													</tr>
												<?php
											}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
	include "footer.php";
?>
