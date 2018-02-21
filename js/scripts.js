


   function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);  }



$(document).on( 'click', '.landing_input_signup', function(e) {
e.preventDefault();

var sendName =$('#landing_input_name').val();
var sendEmail = $("#landing_input_email").val();
var choice = $( "#landing_input_sel1 option:selected" ).val();
var token = $( "#tokenCheck" ).val();


       if (!ValidateEmail($("#landing_input_email").val())) {
       	$('#signUpForm').addClass('shake');
            $('.error').html("Invalid email address.");
                        setTimeout(
			  function() 
			  {
            $('#signUpForm').removeClass('shake');
        }, 1000);
            return false;
        }
        else {
            $('.error').html("Valid email address.");
            $('.error').css({"color":"green"});
        }



$("#signUpForm").removeClass('shake'); 
    if (sendName === "") 
    {
        $(this).addClass('highlight');
        $("input#landing_input_name").focus();
        $("#signUpForm").addClass('shake');
        $("input#landing_input_name").css({"background":"pink","color":"#000"});
        return false;
    }
else if (sendEmail === "") 
    {
    	$("input#landing_input_name").css({"background":"#fff","color":"#000"});
        $(this).addClass('highlight');
        $("input#landing_input_email").focus();
        $("#signUpForm").addClass('shake');
        $("input#landing_input_email").css({"background":"pink","color":"#000"});
        return false;
    }

    else if (choice === 0)
    {
    	
        $(this).addClass('highlight');
        $("#landing_input_sel1").focus();
        $("#signUpForm").addClass('shake');
        $("input#landing_input_email").css({"background":"#fff","color":"#000"});
    	$("#landing_input_sel1").css({"background":"pink","color":"#000"});
  		return false;
    }
$("#landing_input_sel1").css({"background":"#fff","color":"#000"});


$('#wait').show().addClass('flash'); //<----here
var contactList =  $( "#landing_input_sel1 option:selected" ).val();
  $.ajax({        
    type: "POST",
    url: 'test.php',   
    data: {sub_mail: sendEmail, contactChoice: choice, tokenSend:token },
    dataType: 'json',
        success: function(response) {
        	

        	if (response ===1)
        	{
        	$('#wait').hide().removeClass('flash'); //<----here
       $('#join').fadeOut();
        $('#join').html("Thank you for joining our family.").fadeIn();
        $(':input').val('');
        $('.form-group').fadeOut();
    }
    else
    {
        $('#wait').hide().removeClass('flash'); //<----here
       $('#join').fadeOut();
        $('#join').html("Please wait 5 minutes to send another email").fadeIn();
        $(':input').val('');
        $('.form-group').fadeOut();	
    }

    }
});

});