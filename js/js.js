$(document).ready(function () {
	$('.menu li:has(ul)').click(function () {


		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).children('ul').slideUp();
		}
		else {
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('active');
			$(this).addClass('active');
			$(this).children('ul').slideDown();

		}
	});

});