$(function () {
	"use strict";
	$('#confpassword-toggle').hover(function () {
		$('#confpassword').attr('type', 'text');
		$('#confpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
	}, function () {
		$('#confpassword').attr('type', 'password');
		$('#confpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
	});
	$('#newpassword-toggle').hover(function () {
		$('#newpassword').attr('type', 'text');
		$('#newpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
	}, function () {
		$('#newpassword').attr('type', 'password');
		$('#newpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
	});
	$('#oldpassword-toggle').hover(function () {
		$('#oldpassword').attr('type', 'text');
		$('#oldpassword-toggle').children("span").removeClass('fa-eye-slash').addClass('fa-eye');
	}, function () {
		$('#oldpassword').attr('type', 'password');
		$('#oldpassword-toggle').children("span").removeClass('fa-eye').addClass('fa-eye-slash');
	});
});