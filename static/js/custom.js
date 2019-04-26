$(function() {
	"use strict";
	$('#password-toggle').hover( function() {
			$('#password').addClass('show').attr('type','text');
			$('#password-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#password').removeClass('show').attr('type','password');
			$('#password-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
});
