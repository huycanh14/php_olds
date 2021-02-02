$(document).ready(function() {
	
	// console.log('done');

	
	// selector : chọn
	// event: sự kiện gì
	// animate: hiệu ứng
	$('button').click(function(event) {
		/* Act on the event */
		// console.log('done');
		$('h1').animate({marginLeft: 500},400);
	}); /*end click button*/

});