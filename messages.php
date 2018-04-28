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
					$res = mysqli_query($link,"select * from contact_us");
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
													<th class="column1">NAME</th>
													<th class="column2">E-MAIL</th>
													<th class="column3">SUBJECT</th>
													<th class="column4">MESSAGE</th>
												</tr>
											</thead>
											<tbody>
											<?php
											while($row = mysqli_fetch_array($res))
											{
												?>
													<tr>
														<td class="column1"><?php echo $row["name"]; ?></td>
														<td class="column2"><?php echo $row["email"]; ?></td>
														<td class="column3"><?php echo $row["subject"]; ?></td>
														<td class="column4"><?php echo $row["message"]; ?></td>
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
