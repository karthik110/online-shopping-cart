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

        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Add Product</h2>
                <div class="block">
                    
					<form enctype="multipart/form-data" action="" method="post" name="form">
					
					<table>
					<tr>
					<td>Product name</td>
					<td><input type="text" name="pname" required /></td>
					</tr>
					<tr>
					<td>Product price</td>
					<td><input type="number" name="pprice" required /></td>
					</tr>
					<tr>
					<td>Product quantity</td>
					<td><input type="number" name="pquantity" required /></td>
					</tr>
					<tr>
					<td>Product image</td>
					<td><img id="preview" width="100" height="100" src="#" alt="preview">
						<input type="file" onchange="readURL(this)" name="pimage" required />
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
					<option value="Gents_Clothes">Gents Clothes</option>
					<option value="Ladies_Clothes">Ladies Clothes</option>
					<option value="Gents_Shoes">Gents Shoes</option>
					<option value="Ladies_Shoes">Ladies Shoes</option>
					</select>
					</td>
					</tr>
					<tr>
					<td>Product description</td>
					<td><textarea name="pdescription" required ></textarea></td>
					</tr>
					<tr>
					<td colspan="2" align="center">
					<input type="submit" name="submit" value="add" /></td>
					</tr>
					</table>
					
					</form>
					
					<?php
					
						if(isset($_POST["submit"]))
						{
							$v1=rand(1111,9999);
							$v2=md5($v1);
							$fname=$_FILES["pimage"]["name"];
							$location = "./product_images/".$v2.$fname;
							$loc = "product_images/".$v2.$fname;
							move_uploaded_file($_FILES["pimage"]["tmp_name"],$location);
							
							mysqli_query($link, " insert into product(name,price,quantity,image,category,description) values ('$_POST[pname]' , $_POST[pprice] , $_POST[pquantity] , '$loc' , '$_POST[pcategory]' , '$_POST[pdescription]') ");
						}
					
					?>
					
                </div>
            </div>
        </div>

<?php
	include "footer.php";
?>
