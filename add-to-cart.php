<?php

$count=1;
		if(isset($_COOKIE["item"]) && is_array($_COOKIE["item"]))
		{
			foreach( $_COOKIE["item"] as $name => $value )
			{
				$count=$count+1;
			}
		}
		
		$res2=mysqli_query($link,"select * from product where id=$id");
		while($row2=mysqli_fetch_array($res2))
		{
			$image = $row2["image"];
			$name = $row2["name"];
			$price = $row2["price"];
			$available = $row2["quantity"];
			if(isset($_POST["input_qty"]))
				$quantity = $_POST["input_qty"];
			else
				$quantity = $_SESSION["inc_dec"];
			$total = $quantity * $price;
		}
		
		$cartquantity=0;
		
		if(isset($_COOKIE["item"]) && is_array($_COOKIE["item"]))
		{
			$found=0;
			foreach( $_COOKIE["item"] as $c => $value )
			{
				$get = explode( "__" , $value );
				if($image == $get[0])
				{
					$found=1;
					$cartquantity=$get[3];
					$quantity = $get[3] + $quantity;
					$price = $get[2];
					$total = $quantity * $price;
					if($quantity > $available)
					{
						?>
							<script type="text/javascript"> alert("This much quantity not available !\n\nAlready on cart : <?php echo $cartquantity; ?>"); </script>
						<?php
					}
					else
					{
						if($quantity ==0 )
							setcookie("item[$c]", $image."__".$name."__".$price."__".$quantity."__".$total."__".$id , time()-1800 );
						else
						{
							setcookie("item[$c]", $image."__".$name."__".$price."__".$quantity."__".$total."__".$id , time()+1800 );
							if(isset($_POST["input_qty"]))
							{
							?>
							<script type="text/javascript"> alert("Product added to cart successfully."); </script>
							<?php
							}
						}
					}
				}
			}
			if($found==0)
			{
				if($quantity > $available)
				{
					?>
					<script type="text/javascript"> alert("This much quantity not available !\n\nAlready on cart : <?php echo $cartquantity; ?>"); </script>
					<?php
				}
				else
				{
					setcookie("item[$count]", $image."__".$name."__".$price."__".$quantity."__".$total."__".$id , time()+1800 );
					?>
					<script type="text/javascript"> alert("Product added to cart successfully."); </script>
					<?php
				}
			}
		}
		else
		{
			if($quantity > $available)
			{
				?>
					<script type="text/javascript"> alert("This much quantity not available !\n\nAlready on cart : <?php echo $cartquantity; ?>"); </script> 
				<?php
			}
			else
			{
				setcookie("item[$count]", $image."__".$name."__".$price."__".$quantity."__".$total."__".$id , time()+1800 );
				?>
				<script type="text/javascript"> alert("Product added to cart successfully."); </script>
				<?php
			}
		}
?>