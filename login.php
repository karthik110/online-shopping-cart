<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
        <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" name="form1" action="" method="post">
    <p><input type="text" placeholder="username" name="username" required></p>
    <p><input type="password" placeholder="Password" name="password" required></p>
    <p><input type="submit" name="submit1" value="Log in"></p>
  </form>
</div>

 <?php
		if(isset($_POST["submit1"]))
		{
			$res = mysqli_query($link,"select * from admin_login where username='$_POST[username]' && password='$_POST[password]' ");
			while($row=mysqli_fetch_array($res))
			{
				$_SESSION["admin"]=$row["username"];
				?>
				<script type="text/javascript">
					window.location="display_products.php";
				</script>
				<?php
			}
		}
	?>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  
  </body>
</html>