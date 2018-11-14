<?php
	$title = "Login";
	require '../security/headerInclude.php';
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


		     <?php if(!loggedIn()) {?> 
		  
		    <h2 class="text-center">Login</h2>
   <form class="login-form" action="../security/index.php?action=SecurityProcessLogin" method="post">
  <div class="form-group">
        <label class="form-group form_left"><h3>USERNAME</h3></label> <input type="text" class="form-control color-black form_input" name="username" /><br/>    
  </div>
  <div class="form-group">
        <label class="form-group form_left"><h3>PASSWORD</h3></label> <input type="password" class="form-control color-black form_input" name="password" /><br/><br/>
  </div>
        <input type="hidden" name="RequestedPage" value="<?php echo $_GET['RequestedPage'] ?>" />

    <div class="center form-check">
    <button type="submit" class="btn btn-lg btn-login">Submit</button>
	<?php }?>
  </div>

        <?php
            if (isset($_GET['LoginFailure'])) {
                echo '<p/><h4> Invalid Username or Password.  Please try again.</h4>';
            }
        ?>

    </form>
		</div>
		
		
		
	<?php if (!loggedIn()){ ?>                                             

		<div class="col-md-8 banner-sec">
		
			<div class="height-full">
				<img class="pad-top center w-75" src="../images/logo.png" />
			</div>
			

            <div class="carousel-inner" role="listbox">
			
    <div class="carousel-item active">
    </div>
            </div>	   	    
		</div>
		
			<?php }?>

	</div>

		</div>
	</div>
</div>
</section>