
var candflags = [0,0,0,0,0,0,0,0];
var compflags = [0,0,0,0,0,0];

//function for checking the validity of email (at this point, only whether email is available)
function cand_email_validation_handler(event){
	var email = $(this).val();
	if($(this).val() == ""){
		$('#email1').next().html("");
		candflags[0] = 0;
	}else{
		var data = {"email": email}
		$.post("./candemailvalidation.php", data, function(result){
			if(result != 0){
				$('#email1').next().html("&#x274C;");
				candflags[0] = 0;
			}else{
				$('#email1').next().html("&#x2714;");
				candflags[0] = 1;
			}
		})
	}
	if($('#email2').val() != ""){
		cand_email_confirmation_handler(event);
	}
}

//function to check re-entered email is the same as the original e-mail
function cand_email_confirmation_handler(event){
	if($('#email1').val() != "" && $('#email2').val() != ""){
	
		if($('#email1').val() == $('#email2').val()){
			$('#email2').next().html("&#x2714;");
			candflags[1] = 1;
			
		}else{
			$('#email2').next().html("&#x274C;");
			candflags[1] = 0;
		
		}
	}else{
		$('#email2').next().html("");
		candflags[1] = 0;
	}
}

//function for validating the password to ensure that it reaches the correct character number and any other restitions 
function cand_password_validation_handler(event){
	var password = $(this).val();
	console.log($(this).val());
	if(password == ""){
		$('#password1').next().html("");
		candflags[2] = 0;
	}else if(password != "" && password.length < 8){
		$('#password1').next().html("&#x274C;"); //fail
		candflags[2] = 0;
	}else{
		$('#password1').next().html("&#x2714;"); //succeed
		candflags[2] = 1;
	}
	if($('#password2').val() != ""){
		cand_password_confirmation_handler(event);
		
	}
}

//
function cand_password_confirmation_handler(event){
	if($('#password1').val() != "" && $('#password2').val() != ""){
		
		if($('#password1').val() == $('#password2').val()){
			$('#password2').next().html("&#x2714;");
			candflags[3] = 1;
		}else{
			$('#password2').next().html("&#x274C;");
			candflags[3] = 0;
		}
	}else{
		$('#password2').next().html("");
		candflags[3] = 0;
	}
}

function cand_title_confirmation_handler(event){
	if($(this).val() == ""){
		$('#regisSelect').next().html("");
		candflags[4] = 0;
		
	}else{
		$('#regisSelect').next().html("&#x2714;");
		candflags[4] = 1;
	}
	
}

function cand_firstname_empty_handler(event){
	if($(this).val() == ""){
		$('#fname').next().html("");
		candflags[5] = 0;
	}else{
		$('#fname').next().html("&#x2714;");
		candflags[5] = 1;
	}
	
}

function cand_lastname_empty_handler(event){
	if($(this).val() == ""){
		$('#lname').next().html("");
		candflags[6] = 0;
		
	}else{
		$('#lname').next().html("&#x2714;");
		candflags[6] = 1;
	}
	
}

function cand_checkbox_handler(event){
	if($(this).prop('checked') == false){
		candflags[7] = 0;
	}else{
		candflags[7] = 1;
	}
	
}

function cand_register_handler(event){
	for( i=0; i < candflags.length;i++){
		if(candflags[i] == 0){
			return false;
		}
	}
	console.log("got here");
	return true;
}

//
//functions below this point are for the company register form
//

function comp_email_validation_handler(event){
	var email = $(this).val();
	if(email == ""){
		$('#email3').next().html("");
		compflags[0] = 0;
	}else{
		var data = {"email": email}
		$.post("./compemailvalidation.php", data, function(result){
			if(result != 0){
				$('#email3').next().html("&#x274C;");
				compflags[0] = 0;
			}else{
				$('#email3').next().html("&#x2714;");
				compflags[0] = 1;
			}
		})
	}
	if($('#email4').val() != ""){
		comp_email_confirmation_handler(event);
		
	}
	
}

function comp_email_confirmation_handler(event){
	if($('#email3').val() != "" && $('#email4').val() != ""){
	
		if($('#email3').val() == $('#email4').val()){
			$('#email4').next().html("&#x2714;");
			compflags[1] = 1;
			
		}else{
			$('#email4').next().html("&#x274C;");
			compflags[1] = 0;
		
		}
	}else{
		$('#email4').next().html("");
		compflags[1] = 0;
	}
	
}

function comp_password_validation_handler(event){
	var password = $(this).val();
	console.log(password);
	if(password == ""){
		$('#password3').next().html("");
		compflags[2] = 0;
	}else if(password != "" && password.length < 8){
		$('#password3').next().html("&#x274C;"); //fail
		compflags[2] = 0;
	}else{
		$('#password3').next().html("&#x2714;"); //succeed
		compflags[2] = 1;
	}
	if($('#password4').val() != ""){
		comp_password_confirmation_handler(event);
		
	}
	
}

function comp_password_confirmation_handler(event){
	if($('#password3').val() != "" && $('#password4').val() != ""){
		
		if($('#password3').val() == $('#password4').val()){
			$('#password4').next().html("&#x2714;");
			compflags[3] = 1;
		}else{
			$('#password4').next().html("&#x274C;");
			compflags[3] = 0;
		}
	}else{
		$('#password4').next().html("");
		compflags[3] = 0;
	}
	
}

function comp_companyname_empty_handler(event){
	if($(this).val() == ""){
		$(this).next().html("");
		compflags[4] = 0;
		
	}else{
		$(this).next().html("&#x2714;");
		compflags[4] = 1;
	}
	
}

function comp_checkbox_handler(event){
	if($(this).prop('checked') == false){
		compflags[5] = 0;
	}else{
		compflags[5] = 1;
	}
	
}

function comp_register_handler(event){
	for( i=0; i < compflags.length;i++){
		if(compflags[i] == 0){
			return false;
		}
	}
	console.log("got here");
	return true;
}

$(document).ready(function (){
	//Javascript for the candidate register form
	$('#email1').on('focusout', cand_email_validation_handler);
	$('#email2').on('focusout', cand_email_confirmation_handler);
	$('#password1').on('focusout', cand_password_validation_handler);
	$('#password2').on('focusout', cand_password_confirmation_handler);
	$('#regisSelect').on('change', cand_title_confirmation_handler);
	$('#fname').on('focusout', cand_firstname_empty_handler);
	$('#lname').on('focusout', cand_lastname_empty_handler);
	$('#candCheckBox').on('change', cand_checkbox_handler);
	$('#candRegF').on('submit', cand_register_handler);
	
	//Javascript for the company register form
	$('#email3').on('focusout', comp_email_validation_handler);
	$('#email4').on('focusout', comp_email_confirmation_handler);
	$('#password3').on('focusout', comp_password_validation_handler);
	$('#password4').on('focusout', comp_password_confirmation_handler);
	$('#compName').on('focusout', comp_companyname_empty_handler);
	$('#compCheckBox').on('change', comp_checkbox_handler);
	$('#compRegF').on('submit', comp_register_handler);
})