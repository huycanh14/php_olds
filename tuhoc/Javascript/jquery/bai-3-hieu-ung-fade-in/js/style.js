$(document).ready(function() {
	
	// làm mọi thứ biến mất
	$('#form-login').animate({marginLeft: -300,opacity: 0});

	// bắt event và tạo animate
	$('#btn-dk').click(function() {
		// form đăng nhập đi vào
		$('#form-login').animate({marginLeft: 0,opacity: 1});
		// form đăng ký đi ra
		$('#form-dk').animate({marginLeft: -300,opacity: 0});
	});


});