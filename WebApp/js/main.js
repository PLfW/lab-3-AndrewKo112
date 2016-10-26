$(document).ready(function () {
	$("#signup-submit").on("click", function () {
		var form = $("#signup-form");
		var inputs = form.find('input:text, input:password');
		var validators = {
			password: {
	            regex: /^[0-9A-z_]{6,}$/,
	        	min_length: 6,
	        	max_length: 30
	        },
	        email: {
	        	regex: /\S+@\S+\.\S+/,
	        	min_length: 6,
	        	max_length: 40
	        },
	        first_name: {
	        	regex: /^[А-яa-zA-яіІїЇґҐёЁ]{2,}$/,
	        	min_length: 2,
	        	max_length: 30
	        },
	        last_name: {
	        	regex: /^[А-яa-zA-яіІїЇґҐёЁ]{2,}$/,
	        	min_length: 2,
	        	max_length: 30
	        },
	        contact_phone: {
	        	regex: /^\+?[0-9]{12,}$/,
	        	min_length: 12,
	        	max_length: 13
	        }
		};
		var isValid = true; 
		$.each(validators, function (key, value) {
			if(!validateField(key, value)) {
				$("#" + key).popover('show');
				isValid = false;
			}
		})
		if ($("#password").val() != $("#password_confirm").val()) {
			$("#password_confirm").attr("data-content", "Паролі не співпадають");
			$("#password_confirm").popover('show');
			isValid = false;
		}
		$.ajax({
		  type: "POST",
		  url: "/signup_confirm",
		  data: form.serialize(),
		  success: function() {
		  	alert("success");
		  }
		});
	});
});

function validateField(id, validator) {
	var input = $("#" + id);
	if (!input) {
		return true;
	}
	var val = input.val();
	if ('min_length' in validator && input.val().length < validator.min_length) {
		input.attr("data-content", "Ввід не може бути коротшим, ніж " + validator.min_length + " символів");
		return false;
	}
	if ('max_length' in validator && input.val().length > validator.max_length) {
		input.attr("data-content", "Ввід не може бути довшим, ніж " + validator.max_length + " символів");
		return false;
	}
	if ('regex' in validator && !(new RegExp(validator.regex).test(input.val())) ) {
		input.attr("data-content", "Ви використали недопустимі символи");
		return false;
	} 
}
