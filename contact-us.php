<?php
include "config.php";
include "header.php";

?>	 
	 <div id="contact-page" class="container">
    	<div class="bg"> 	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary center" value="Submit">
				            </div>
				        </form>
						
						<?php
							if(isset($_POST["submit"])&&$_POST["submit"]!="")
							{
								$res=mysqli_query($link,"insert into contact_us(name,email,subject,message) values('$_POST[name]', '$_POST[email]', '$_POST[subject]', '$_POST[message]');");
								if($res)
								{
									?>
									<script type="text/javascript">alert("message sent successfully");</script>
									<?php
								}
								$_POST["submit"]="";
							}
						?>
						
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p style="font-size:20px">ShoppoSite</p>
							<p style="color:#0099FF"><i>Singanallur</i></p>
							<p style="color:#0099FF"><i>Coimbatore</i></p>
							<p style="color:#0099FF"><i>India</i></p>
							<p style="color:#0099FF"><b style="color:#000000">Mobile:</b> 94888 44383</p>
							<p style="color:#0099FF"><b style="color:#000000">Email:</b> info@shopposite.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
<?php
	include "footer.php";
?>