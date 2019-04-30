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
	$('#confpassword-toggle').hover( function() {
			$('#confpassword').attr('type','text');
			$('#confpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#confpassword').attr('type','password');
			$('#confpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
	$('#newpassword-toggle').hover( function() {
			$('#newpassword').attr('type','text');
			$('#newpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#newpassword').attr('type','password');
			$('#newpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
	$('#oldpassword-toggle').hover( function() {
			$('#oldpassword').attr('type','text');
			$('#oldpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
		}, function() {
			$('#oldpassword').attr('type','password');
			$('#oldpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
		}
	);
});
