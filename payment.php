<?php
include "config.php";
session_start();

	if(isset($_COOKIE["item"]))
	{
		foreach( $_COOKIE["item"] as $i => $value )
		{
			$get = explode("__", $value);
			$img = $get[0];
			$name = $get[1];
			$price = $get[2];
			$qty = $get[3];
			$total = $get[4];
			$id = $get[5];
			
			$res = mysqli_query($link, "insert into shopped_products(order_id,name,quantity,price,image,total) values($_SESSION[order_id],'$name',$qty,$price,'$img',$total);" );
			setcookie("item[$i]", $img."__".$name."__".$price."__".$qty."__".$total."__".$id , time()-1800 );
			
			mysqli_query($link, "update product set quantity=quantity-$qty where id=$id;" );
			
		}
	}

?>

<script type="text/javascript">
	window.location = "shop.php";
</script>