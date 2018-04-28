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
$id=$_GET["id"];
$res = mysqli_query($link,"select * from product where id=$id;");
while($row = mysqli_fetch_array($res))
{
	$img=$row["image"];
	$name=$row["name"];
	$price=$row["price"];
	$quantity=$row["quantity"];
	$category=$row["category"];
	$description=$row["description"];
}

if(isset($_POST["submit"]))
{
	$v1=rand(1111,9999);
	$v2=md5($v1);
	$fname=$_FILES["pimage"]["name"];
	
	if($fname=="")
	{
		mysqli_query($link, "update product set name='$_POST[pname]', price='$_POST[pprice]', quantity='$_POST[pquantity]', category='$_POST[pcategory]', description='$_POST[pdescription]' where id=$id;" );
	}
	else
	{
		$location = "./product_images/".$v2.$fname;
		$loc = "product_images/".$v2.$fname;
		move_uploaded_file($_FILES["pimage"]["tmp_name"],$location);
		unlink($img);
		mysqli_query($link, "update product set name='$_POST[pname]', price='$_POST[pprice]', quantity='$_POST[pquantity]', image='$loc', category='$_POST[pcategory]', description='$_POST[pdescription]' where id=$id;" );
	}
	?>
		<script type="text/javascript">
			window.location="display_products.php";
		</script>
	<?php	
}
include "header.php";
?>

        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Edit Product</h2>
                <div class="block">
                    
					<form enctype="multipart/form-data" action="" method="post" name="form">
					
					<table>
					<tr>
					<td>Product name</td>
					<td><input type="text" name="pname" value="<?php echo $name; ?>" required /></td>
					</tr>
					<tr>
					<td>Product price</td>
					<td><input type="number" name="pprice" value="<?php echo $price; ?>" required /></td>
					</tr>
					<tr>
					<td>Product quantity</td>
					<td><input type="number" name="pquantity" value="<?php echo $quantity; ?>" required /></td>
					</tr>
					<tr>
					<td>Product image</td>
					<td><img id="preview" width="100" height="100" src="<?php echo $img; ?>">
						<input type="file" onchange="readURL(this)" name="pimage" value="<?php echo $img; ?>"/>
					</td>
					
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

					</tr>
					<tr>
					<td>Product category</td>
					<td>
					<select name="pcategory" required>
					<option value="Gents_Clothes" <?php if($category=="Gents_Clothes") echo "selected='selected'"; ?> >Gents Clothes</option>
					<option value="Ladies_Clothes" <?php if($category=="Ladies_Clothes") echo "selected='selected'"; ?> >Ladies Clothes</option>
					<option value="Gents_Shoes" <?php if($category=="Gents_Shoes") echo "selected='selected'"; ?> >Gents Shoes</option>
					<option value="Ladies_Shoes" <?php if($category=="Ladies_Shoes") echo "selected='selected'"; ?> >Ladies Shoes</option>
					</select>
					</td>
					</tr>
					<tr>
					<td>Product description</td>
					<td><textarea name="pdescription" required ><?php echo $description; ?></textarea></td>
					</tr>
					<tr>
					<td colspan="2" align="center">
					<input type="submit" name="submit" value="update" /></td>
					</tr>
					</table>
					
					</form>
					
					<?php
					
						
					?>
					
                </div>
            </div>
        </div>

<?php
	include "footer.php";
?>
