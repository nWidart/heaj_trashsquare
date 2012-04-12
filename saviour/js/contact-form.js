/* ==================================================

Below are the jQuery functions and validation for the contact section.

================================================== */

jQuery(document).ready(function() {
	jQuery('form#contactForm').submit(function() {
		jQuery('form#contactForm label.error').remove();
		jQuery('form#contactForm span.error').remove();
		var hasError = false;
		jQuery('.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				var labelText = jQuery(this).prev('label').text();
				jQuery(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				hasError = true;
			} else if(jQuery(this).hasClass('email-input')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = jQuery(this).prev('label').text();
					jQuery(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			jQuery('form#contactForm li.buttons button').fadeOut('normal', function() {
				jQuery(this).parent().append('<span class="loading">Loading...</span>');
			});
			var formInput = jQuery(this).serialize();
			jQuery.post($(this).attr('action'),formInput, function(data){
				jQuery('form#contactForm').slideUp("fast", function() {				   
					jQuery(this).before('<p class="thanks"><strong>Thanks!</strong> Your email was sent successfully.</p>');
				});
			});
		}
		
		return false;
		
	});
	
	// contact form validation
    jQuery("#contactForm").validate();
    
});