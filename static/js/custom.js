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
	$('#confpassword-toggle').hover( function() {
			$('#confpassword').addClass('show').attr('type','text');
			$('#confpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#confpassword').removeClass('show').attr('type','password');
			$('#confpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
	$('#newpassword-toggle').hover( function() {
			$('#newpassword').addClass('show').attr('type','text');
			$('#newpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#newpassword').removeClass('show').attr('type','password');
			$('#newpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
	$('#oldpassword-toggle').hover( function() {
			$('#oldpassword').addClass('show').attr('type','text');
			$('#oldpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#oldpassword').removeClass('show').attr('type','password');
			$('#oldpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
});
