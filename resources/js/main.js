jQuery(document).ready(function($) {
	$('#Menu__collapse').click(function(event) {
		$('.menu-item').slideToggle('slow');
		$('.menu-item').css({'display':'flex'})
	});
	$('#submitContactForm').submit(function(event) {
	event.preventDefault();
	var that=$(this);
	$.post(myAjax.ajaxurl,
		that.serialize(),
		function(result){
			console.log(result);
			alert('your message was sent');
		}
		);
	console.log('Enviado');
	});
});