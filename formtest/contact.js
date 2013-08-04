// JavaScript Document


	
	//var stepOne = showContactStepOne();
	//var stepTwo = showContactStepTwo();
	
	function showContactStepOne() {
		$("#contactStepTwo").fadeOut("fast", function () {
			$("#formLoading").hide();
			$("#contactStepOne").fadeIn("slow");
			
		});
	}
	
	function showContactStepTwo() {
		$("#contactStepOne").fadeOut("fast",  function () {
			$("#formLoading").hide();
			$("#contactStepThree").hide();//required when user goes back
			$("#contactStepTwo").fadeIn("slow");
		});	
	}
	
	function showContactStepThree() {
		$("#contactStepTwo").fadeOut("fast",  function () {
			$("#formLoading").hide();											
			$("#contactStepThree").fadeIn("slow");
		});	
	}
	
	function showContactStepFour() {
		$("#contactStepThree").fadeOut("fast",  function () {
			$("#formLoading").hide();											
			$("#contactStepFour").fadeIn("slow");
		});	
	}
	
	function showContactBackToStart() {
		$("#contactStepFour").fadeOut("fast",  function () {
			$("#formLoading").hide();											
			$("#contactStepOne").fadeIn("slow");
			$('#contactForm')[0].reset();
		});	
	}
	
$(document).ready(function() {
	//go to step 2
	$("#forwardToStep2").live("click", function () 
	{
		showContactStepTwo(false);
		//console.log('blah');
		return false;
	});
	
	//go to step 3
	
	$("#saveUserEmail").live("click", function () 
	{
		email = $("#email");
		emptyerror = "Please fill out this field.";
		emailerror = "Please enter a valid e-mail.";
		if(email.val()=="")
		{
			email.addClass("needsfilled");
			email.val(emptyerror);
			return false;
		}else if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
			email.addClass("needsfilled");
			email.val(emailerror);
		}else{
			showContactStepThree(false);
		}
		return false;
	});
	
	//go to step 4
	
	$("#saveUserOptions").live("click", function () 
	{
		showContactStepFour(false);
		return false;
	});
		
	//BACK to step 1
	$("#backToStep1").live("click", function () 
	{
		showContactStepOne(false);
		return false;
	});
	
	//BACK to step 2
	$("#backToStep2").live("click", function () 
	{
		showContactStepTwo(false);
		return false;
	});
		
	//BACK to start
	$("#backToStart").live("click", function () 
	{
		showContactBackToStart();
	});
	
	//on load of the page
	showContactStepOne();
	$('#contactForm')[0].reset();
	
		/*
	Created 09/27/09										
	Questions/Comments: jorenrapini@gmail.com						
	COPYRIGHT NOTICE		
	Copyright 2009 Joren Rapini
	*/
	
	/*// Place ID's of all required fields here.
	required = ["name","skype"];
	// If using an ID other than #email or #error then replace it here
	email = $("#email");
	errornotice = $("#error");
	// The text to show up within a field when it is incorrect
	emptyerror = "Please fill out this field.";
	emailerror = "Please enter a valid e-mail.";*/

		// Clears any fields in the form when the user clicks on them
	$(":input").focus(function(){		
	   if ($(this).hasClass("needsfilled") ) {
			$(this).val("");
			$(this).removeClass("needsfilled");
	   }
	});
	
	
	
	
});

function submitForm(){	
		//Validate required fields
		// Place ID's of all required fields here.
		required = ["name","skype"];
		// If using an ID other than #email or #error then replace it here
		email = $("#email");
		errornotice = $("#error");
		// The text to show up within a field when it is incorrect
		emptyerror = "Please fill out this field.";
		emailerror = "Please enter a valid e-mail.";
		for (i=0;i<required.length;i++) {
			var input = $('#'+required[i]);
			if ((input.val() == "") || (input.val() == emptyerror)) {
				input.addClass("needsfilled");
				input.val(emptyerror);
				errornotice.fadeIn(750);
			} else {
				input.removeClass("needsfilled");
			}
		}
		//var checkVal = $('#optionsCheckboxes').is(':checked');
		//var checkVal = $('input:checkbox[name=optionsCheckboxes[]]').is(':checked');
		var checkVal = $('input[type=checkbox]').is(':checked');
		if(!checkVal)
		{
			errornotice.fadeIn(750);
			return false;
		}
		// Validate the e-mail.
		/*if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
			email.addClass("needsfilled");
			email.val(emailerror);
		}*/

		//if any inputs on the page have the class 'needsfilled' the form will not submit
		if ($(":input").hasClass("needsfilled")) {
			return false;
		} else {
			errornotice.hide();
			$.post('mail.php', $('#contactForm').serialize(),function(data) {
				//alert(data);
				showContactStepFour();
				});
			return true;
		}
	}
	
