		<?php
// session_start();
$_SESSION['token'] = md5(session_id() . time());

?>


    <form method="POST" id="signUpForm" class="animated">
<div class="logo">
<img src="images/EKA-logo.png" alt=""/>
</div>
<h4 id="join">Join our email family</h4>

<div class="form-group form_top">
		<div class="">
    		<input type="text" class="form-control required" id="landing_input_name" placeholder="Name">
    		<!-- <span class="input-group-addon"></span> -->
        
    		<input type="email" class="form-control required" id="landing_input_email" name="sub_email" placeholder="Email">
<span class="error"></span>
		</div>
</div>

<div class="form-group">
<div class="">
  <select class="form-control required" id="landing_input_sel1" name="landing_input_sel1">
  <option value="0">Please Choose</option>
    <option value="61045">Architects</option>
    <option value="61047">Interior Designers</option>
    <option value="61048">Hotels</option>
    <option value="61046">Engineers / QS</option>
    <option value="61050">Bankers & Business Associates</option>
    <option value="61051">Other</option>
  </select>
  <input type="hidden" name="token" id="tokenCheck" value="<?php echo $_SESSION['token'] ?>" />
  <!-- <span class="input-group-addon"></span> -->
  <button type="submit" class="landing_input_signup btn btn-default form-control">Sign Up</button>
</div>
</div>
<span class="alert"></span>
	<div id="wait" class="animated infinite"><h4>Sending</h4></div>	  
		</form>