$(function() {
	"use strict";
	$('#password-toggle').hover( function() {
			$('#password').attr('type','text');
			$('#password-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#password').attr('type','password');
			$('#password-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
	$('#password-toggle2').hover( function() {
			$('#confpassword').attr('type','text');
			$('#password-toggle2').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#confpassword').attr('type','password');
			$('#password-toggle2').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
});
