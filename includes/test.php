

		<?php
// session_start();
$_SESSION['token'] = md5(session_id() . time());

?>


    <form method="POST" id="signUpForm" class="animated" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8">
<!-- hidden for centered form -->
<!--<div class="logo">
<img src="images/EKA-logo.png" alt=""/>
</div>-->

<h4 id="join">Join our Email Family</h4>

<div class="form-group form_top">
		<div class="">
    		<input type="text" class="form-control required" id="landing_input_name" name="name" placeholder="Name">
    		<!-- <span class="input-group-addon"></span> -->
        
    		<input type="email" class="form-control required" id="landing_input_email" name="email" placeholder="Email">
<span class="error"></span>
		</div>
</div>

<div class="form-group">
<div class="">
  <input type="hidden" name="token" id="tokenCheck" value="<?php echo $_SESSION['token'] ?>" />
  <!-- <span class="input-group-addon"></span> -->
  <button type="submit" class="landing_input_signup btn btn-default form-control">Sign Up</button>
</div>
</div>
<span class="alert"></span>
	<div id="wait" class="animated infinite"><h4>Sending</h4></div>	  
		</form>