<?php
	include "config.php";
	$id=$_GET["id"];
	
	$res = mysqli_query($link,"select * from product where id=$id;");
	while($row = mysqli_fetch_array($res))
	{
		$img = $row["image"];
	}
	unlink($img);
	
	mysqli_query($link,"delete from product where id=$id;");
?>

<script type="text/javascript">
	window.location = "display_products.php";
</script>